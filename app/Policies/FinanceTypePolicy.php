<?php

namespace App\Policies;

use App\Enum\RolesAndPermissionEnum;
use App\Models\ExpenseType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpenseTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->canAny([
                RolesAndPermissionEnum::CAN_VIEW_EXPENSES,
                RolesAndPermissionEnum::CAN_LIST_EXPENSES
            ]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ExpenseType $expenseType): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->canAny([
                RolesAndPermissionEnum::CAN_VIEW_EXPENSES,
                RolesAndPermissionEnum::CAN_LIST_EXPENSES
            ]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->can(RolesAndPermissionEnum::CAN_CREATE_EXPENSE_TYPE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ExpenseType $expenseType): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->can(RolesAndPermissionEnum::CAN_EDIT_EXPENSE_TYPE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ExpenseType $expenseType): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->can(RolesAndPermissionEnum::CAN_DELETE_EXPENSE_TYPE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ExpenseType $expenseType): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE)
            || $user->can(RolesAndPermissionEnum::CAN_RESTORE_EXPENSE_TYPE);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ExpenseType $expenseType): bool
    {
        return $user->hasRole(RolesAndPermissionEnum::ADMIN_ROLE);
    }
}
