<?php

namespace App\Filament\Resources;

use App\Enum\ExpenseStatusEnum;
use App\Filament\Resources\ExpenseResource\Pages;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Util\AccountingUtil;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationGroup = 'Accounting';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::resourceForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expense_type_id')
                    ->formatStateUsing(fn (Expense $expense) => $expense->type->type)
                    ->label(__('Type'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->prefix('₱')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn (Expense $expense) => ExpenseStatusEnum::constToText($expense->status)),
                Tables\Columns\TextColumn::make('date_paid')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListExpense::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function resourceForm(): array
    {
        $availableFinance = AccountingUtil::getAvailableFinance(true);

        return [
            Section::make('Important Information')
                ->description('💡 Can add expense with a maximum amount of ' . $availableFinance)
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('expense_type_id')
                        ->label(__('Expense Type'))
                        ->required()
                        ->options(fn () => ExpenseType::query()->pluck('type', 'id'))
                        ->searchable(),
                    Forms\Components\TextInput::make('amount')
                        ->required()
                        ->numeric()
                        ->maxValue(AccountingUtil::getAvailableFinance()),
                    Forms\Components\Select::make('status')
                        ->required()
                        ->default(ExpenseStatusEnum::NORMAL)
                        ->options(ExpenseStatusEnum::toOptions()),
                    Forms\Components\Textarea::make('notes')
                        ->columnSpanFull(),
                ])
        ];
    }
}
