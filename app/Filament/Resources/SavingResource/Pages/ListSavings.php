<?php

namespace App\Filament\Resources\SavingResource\Pages;

use App\Filament\Resources\SavingResource;
use App\Util\AccountingUtil;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms;
use Filament\Forms\Components\Section;

class ListSavings extends ListRecords
{
    protected static string $resource = SavingResource::class;

    protected function getHeaderActions(): array
    {
        $availableFinance = AccountingUtil::getAvailableFinance();
        $availableFinanceString = AccountingUtil::formatToMoney($availableFinance);

        return [
            Actions\CreateAction::make()
                ->form([
                    Section::make('Important Information')
                        ->description('💡 Can save up to a total of ' . $availableFinanceString)
                        ->schema([
                            Forms\Components\TextInput::make('amount')
                                ->required()
                                ->numeric()
                                ->minValue(1)
                                ->maxValue($availableFinance)
                        ]),
                ])
                ->slideOver()
                ->modalWidth(MaxWidth::Medium)
                ->successNotificationTitle(__('New savings has been added!')),
        ];
    }
}
