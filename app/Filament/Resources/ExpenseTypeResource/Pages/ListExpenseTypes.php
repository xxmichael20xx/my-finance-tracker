<?php

namespace App\Filament\Resources\ExpenseTypeResource\Pages;

use App\Filament\Resources\ExpenseTypeResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListExpenseTypes extends ListRecords
{
    protected static string $resource = ExpenseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->form([
                    TextInput::make('type')
                        ->required()
                        ->unique('expense_types')
                ])
                ->modalWidth(MaxWidth::Medium)
                ->slideOver()
                ->successNotificationTitle(__('New expense type has been created!'))
        ];
    }
}
