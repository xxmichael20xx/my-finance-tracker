<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListExpense extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->form(ExpenseResource::resourceForm())
                ->slideOver()
                ->modalWidth(MaxWidth::Medium)
                ->successNotificationTitle(__('New expense has been added!')),
        ];
    }
}
