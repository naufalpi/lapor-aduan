<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Aduan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AduanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AduanResource\RelationManagers;
use Illuminate\Support\Facades\Auth; 
use App\Filament\Resources\AduanResource\RelationManagers\TanggapansRelationManager;


class AduanResource extends Resource
{
    protected static ?string $model = Aduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Data readonly/non-editable
            TextInput::make('nomor_tiket')->label('No. Tiket')->disabled(),
            TextInput::make('judul')->disabled(),
            Textarea::make('isi')->disabled(),
            TextInput::make('nama')->label('Nama Pelapor')->disabled(),
            TextInput::make('email')->disabled(),
            TextInput::make('nomor_wa')->label('No. WhatsApp')->disabled(),
            TextInput::make('kategori')->disabled(),
            TextInput::make('lokasi')->disabled(),
            FileUpload::make('lampiran')->disabled(),

            // Yang bisa diedit: status, tanggapan, opd
            Select::make('status')
                ->options([
                    'Menunggu' => 'Menunggu',
                    'Diproses' => 'Diproses',
                    'Selesai' => 'Selesai',
                ])
                ->required(),

            Select::make('opd_id')
                ->label('OPD Penanggung Jawab')
                ->options(\App\Models\Opd::pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->disabled(fn () => Auth::user()?->role !== 'superadmin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_tiket')
                    ->label('No. Tiket')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->sortable()
                    ->searchable()
                    ->limit(20),
                TextColumn::make('nama')
                    ->label('Pelapor'),
                TextColumn::make('kategori'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'danger' => 'Menunggu',
                        'warning' => 'Diproses',
                        'success' => 'Selesai',
                    ]),
                TextColumn::make('opd.nama')
                    ->label('OPD')
                    ->limit(15),
                TextColumn::make('created_at')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TanggapansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAduans::route('/'),
            // 'create' => Pages\CreateAduan::route('/create'),
            'edit' => Pages\EditAduan::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();

        // Jika user adalah admin opd, filter aduan berdasarkan opd_id
        if (Auth::check() && Auth::user()->role === 'opd') {
            $query->where('opd_id', Auth::user()->opd_id);
        }

        return $query->orderBy('created_at', 'desc');
    }
}
