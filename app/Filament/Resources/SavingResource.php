<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavingResource\Pages;
use App\Models\Saving;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SavingResource extends Resource
{
    protected static ?string $model = Saving::class;

    protected static ?string $navigationGroup = 'Accounting';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->prefix('₱')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
            ])
            ->filters([
                //
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
            'index' => Pages\ListSavings::route('/'),
        ];
    }
}
