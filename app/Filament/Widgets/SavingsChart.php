<?php

namespace App\Filament\Widgets;

use App\Models\Saving;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class SavingsChart extends ChartWidget
{
    protected static ?string $heading = 'My Savings';

    public ?string $filter = 'this_year';

    protected static string $color = 'success';

    protected function getFilters(): ?array
    {
        return [
            'this_year' => 'This year',
            '2024' => '2024'
        ];
    }

    protected function getData(): array
    {
        $year = $this->filter == 'this_year' ? date('Y') : $this->filter;

        $data = Trend::model(Saving::class)
            ->between(
                start: Carbon::create($year, 1, 1),
                end: Carbon::create($year, 12, 31)
            )
            ->perMonth()
            ->sum('amount')
            ->pluck('aggregate');
        return [
            'datasets' => [
                [
                    'label' => 'My Savings of the year ' . $year,
                    'data' => $data
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
