<?php

namespace App\Util;

use App\Models\Expense;
use App\Models\Income;

class AccountingUtil
{
    /**
     * Get the total expenses
     *
     * @param boolean $withFormat
     * @return integer|string
     */
    public static function getTotalExpenses(bool $withFormat = false): int|string
    {
        $amount = Expense::query()->sum('amount');

        if ($withFormat) {
            return self::formatToMoney($amount);
        }

        return $amount;
    }

    /**
     * Get the total incomes
     *
     * @param boolean $withFormat
     * @return integer|string
     */
    public static function getTotalIncomes(bool $withFormat = false): int|string
    {
        $amount = Income::query()->sum('amount');

        if ($withFormat) {
            return self::formatToMoney($amount);
        }

        return $amount;
    }

    /**
     * Get the total available finance to use via sum of total expenses and incomes
     *
     * @param boolean $withFormat
     * @return integer|string
     */
    public static function getAvailableFinance(bool $withFormat = false): int|string
    {
        $amount = intval(self::getTotalIncomes() - self::getTotalExpenses());

        if ($withFormat) {
            return self::formatToMoney($amount);
        }

        return $amount;
    }

    /**
     * Format the amount to a readable format and with currency
     *
     * @param integer $amount
     * @return string
     */
    public static function formatToMoney(int $amount): string
    {
        return '₱' . number_format($amount);
    }
}