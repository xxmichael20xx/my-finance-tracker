<?php

namespace App\Filament\Widgets;

use App\Models\Income;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class IncomesChart extends ChartWidget
{
    protected static ?string $heading = 'My Incomes';

    public ?string $filter = 'this_year';

    protected static string $color = 'warning';

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

        $data = Trend::model(Income::class)
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
                    'label' => 'My Incomes of the year ' . $year,
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
