<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Aduan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Placeholder;

use Filament\Support\Enums\FontWeight;
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
    protected static ?string $navigationLabel = 'Kelola Aduan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Data readonly/non-editable
            Placeholder::make('created_at')
                ->label('Dibuat Pada')
                ->content(fn ($record) => $record->created_at
                    ? $record->created_at->timezone('Asia/Jakarta')->format('d M Y H:i')
                    : '-')
                ->extraAttributes(['class' => 'font-bold text-gray-800']),

            Placeholder::make('updated_at')
                ->label('Diperbarui Pada')
                ->content(fn ($record) => $record->updated_at
                    ? $record->updated_at->timezone('Asia/Jakarta')->format('d M Y H:i')
                    : '-')
                ->extraAttributes(['class' => 'font-bold text-gray-800']),

            Placeholder::make('nomor_tiket')
                ->label('No. Tiket')
                ->content(fn ($record) => $record->nomor_tiket),
            Placeholder::make('judul')
                ->label('Judul')
                ->content(fn ($record) => $record->judul),

            Placeholder::make('isi')
                ->label('Isi Laporan')
                ->content(fn ($record) => $record->isi),

            Placeholder::make('nama')
                ->label('Nama Pelapor')
                ->content(fn ($record) => $record->nama),
            
            Placeholder::make('email')
                ->label('Email')
                ->content(fn ($record) => $record->email),
            Placeholder::make('nomor_wa')
                ->label('No. WhatsApp')
                ->content(fn ($record) => $record->nomor_wa),
            Placeholder::make('kategori')
                ->label('Kategori')
                ->content(fn ($record) => $record->kategori),
            Placeholder::make('lokasi')
                ->label('Lokasi')
                ->content(fn ($record) => $record->lokasi),
 

            Placeholder::make('lampiran')
                ->label('Lampiran')
                ->content(fn ($record) => $record->lampiran
                    ? view('components.lampiran-link', ['url' => Storage::url($record->lampiran)])
                    : 'Tidak ada lampiran'),

            

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

    public static function getNavigationBadge(): ?string
    {
        // Hitung aduan dengan status 'Menunggu'
        $count = Aduan::where('status', 'Menunggu')->count();

        // Jika tidak ada aduan baru, tidak perlu tampilkan badge
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string | array | null
    {
        return 'danger'; // Warna merah
    }



}
