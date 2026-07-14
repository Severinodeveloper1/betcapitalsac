<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ViewAny:Role');
    }

    public function view(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('View:Role');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Create:Role');
    }

    public function update(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Update:Role');
    }

    public function delete(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Delete:Role');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('DeleteAny:Role');
    }

    public function restore(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Restore:Role');
    }

    public function forceDelete(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ForceDelete:Role');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ForceDeleteAny:Role');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('RestoreAny:Role');
    }

    public function replicate(AuthUser $authUser, Role $role): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Replicate:Role');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Reorder:Role');
    }
}