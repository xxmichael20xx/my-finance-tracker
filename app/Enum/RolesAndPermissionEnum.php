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

    public const CAN_VIEW_FINANCES = 'can view finances';
    public const CAN_CREATE_FINANCE = 'can create finance';
    public const CAN_EDIT_FINANCE = 'can edit finance';
    public const CAN_DELETE_FINANCE = 'can delete finance';
    public const CAN_RESTORE_FINANCE = 'can restore finance';
    public const CAN_EXPORT_FINANCE = 'can export finance';

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

                self::CAN_VIEW_FINANCES,
                self::CAN_CREATE_FINANCE,
                self::CAN_EDIT_FINANCE,
                self::CAN_DELETE_FINANCE,
                self::CAN_RESTORE_FINANCE,
                self::CAN_EXPORT_FINANCE,
            ]
        ];
    }
}