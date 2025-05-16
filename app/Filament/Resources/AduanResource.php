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
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AduanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AduanResource\RelationManagers;

class AduanResource extends Resource
{
    protected static ?string $model = Aduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_tiket')
                    ->label('Nomor Tiket')
                    ->disabled(),

                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori')
                    ->disabled(),

                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->disabled(),

                Forms\Components\Textarea::make('isi')
                    ->label('Isi Aduan')
                    ->disabled(),
                Forms\Components\Textarea::make('lokasi')
                    ->label('Lokasi')
                    ->disabled(),

                Forms\Components\TextInput::make('nama')
                    ->label('Nama Pengirim')
                    ->disabled(),

                Forms\Components\TextInput::make('email')
                    ->label('Email Pengirim')
                    ->disabled(),

             

                Forms\Components\TextInput::make('nomor_wa')
                    ->label('Nomor WA Pengirim')
                    ->disabled(),

                Forms\Components\Select::make('status')
                ->options([
                    'Menunggu' => 'Menunggu',
                    'Diproses' => 'Diproses',
                    'Selesai' => 'Selesai',
                ])
                ->required(),

            Forms\Components\Textarea::make('tanggapan')
                ->label('Pesan/Tanggapan')
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_tiket')
                ->searchable(),
                TextColumn::make('judul')
                ->searchable(),
                TextColumn::make('kategori')
                ->searchable(),
                TextColumn::make('lokasi')
                ->searchable(),
                TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Menunggu' => 'gray',
                    'Diproses' => 'warning',
                    'Selesai' => 'success',
                    'Ditolak' => 'danger',
                })
                ->searchable(),
                TextColumn::make('created_at')
                ->searchable()
                ->label('Dibuat Tanggal'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAduans::route('/'),
            // 'create' => Pages\CreateAduan::route('/create'),
            // 'edit' => Pages\EditAduan::route('/{record}/edit'),
        ];
    }
}
