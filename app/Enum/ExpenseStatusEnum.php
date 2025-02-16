<?php

namespace App\Enum;

class ExpenseStatusEnum
{
    public const NORMAL = 1;
    public const NOT_PAID = 2;
    public const PAID = 3;

    public static function constToText(int|string $key): string
    {
        return match ($key) {
            1 => 'Normal',
            2 => 'Not Paid',
            default => 'Paid'
        };
    }

    public static function toOptions(): array
    {
        return [
            self::NORMAL => 'Normal',
            self::NOT_PAID => 'Not Paid',
            self::PAID => 'Paid',
        ];
    }
}