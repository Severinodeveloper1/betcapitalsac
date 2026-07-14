<?php

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ViewAny:User');
    }

    public function view(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('View:User');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Create:User');
    }

    public function update(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Update:User');
    }

    public function delete(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Delete:User');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('DeleteAny:User');
    }

    public function restore(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Restore:User');
    }

    public function forceDelete(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ForceDelete:User');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('ForceDeleteAny:User');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('RestoreAny:User');
    }

    public function replicate(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Replicate:User');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->hasRole('super_admin') || $authUser->hasPermissionTo('Reorder:User');
    }
}