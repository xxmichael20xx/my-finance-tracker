<?php

namespace App\Enum;

class RolesAndPermissionEnum
{
    public const ADMIN_ROLE = 'Admin';

    public const CAN_LIST_USERS = 'can list users';
    public const CAN_VIEW_USER = 'can view user';
    public const CAN_CREATE_USER = 'can create user';
    public const CAN_EDIT_USER = 'can edit user';
    public const CAN_DELETE_USER = 'can delete user';
    public const CAN_RESTORE_USER = 'can restore user';

    public const CAN_LIST_EXPENSES = 'can list expenses';
    public const CAN_VIEW_EXPENSES = 'can view expenses';
    public const CAN_CREATE_EXPENSE = 'can create expense';
    public const CAN_EDIT_EXPENSE = 'can edit expense';
    public const CAN_DELETE_EXPENSE = 'can delete expense';
    public const CAN_RESTORE_EXPENSE = 'can restore expense';
    public const CAN_EXPORT_EXPENSE = 'can export expense';

    public const CAN_LIST_EXPENSE_TYPES = 'can list expense types';
    public const CAN_VIEW_EXPENSE_TYPE = 'can view expense type';
    public const CAN_CREATE_EXPENSE_TYPE = 'can create expense type';
    public const CAN_EDIT_EXPENSE_TYPE = 'can edit expense type';
    public const CAN_DELETE_EXPENSE_TYPE = 'can delete expense type';
    public const CAN_RESTORE_EXPENSE_TYPE = 'can restore expense type';

    /**
     * Return all constants
     *
     * @return array
     */
    public static function all(): array
    {
        return [
            self::ADMIN_ROLE => [
                self::CAN_LIST_USERS,
                self::CAN_VIEW_USER,
                self::CAN_CREATE_USER,
                self::CAN_EDIT_USER,
                self::CAN_DELETE_USER,
                self::CAN_RESTORE_USER,

                self::CAN_LIST_EXPENSES,
                self::CAN_VIEW_EXPENSES,
                self::CAN_CREATE_EXPENSE,
                self::CAN_EDIT_EXPENSE,
                self::CAN_DELETE_EXPENSE,
                self::CAN_RESTORE_EXPENSE,
                self::CAN_EXPORT_EXPENSE,

                self::CAN_LIST_EXPENSE_TYPES,
                self::CAN_VIEW_EXPENSE_TYPE,
                self::CAN_CREATE_EXPENSE_TYPE,
                self::CAN_EDIT_EXPENSE_TYPE,
                self::CAN_DELETE_EXPENSE_TYPE,
                self::CAN_RESTORE_EXPENSE_TYPE,
            ]
        ];
    }
}