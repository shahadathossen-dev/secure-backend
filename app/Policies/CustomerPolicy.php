<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Customers;
use App\Models\User;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('view-any-customers');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customers  $customers
     * @return mixed
     */
    public function view(User $user, Customers $customers)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('view-customers');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('create-customers');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customers  $customers
     * @return mixed
     */
    public function update(User $user, Customers $customers)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('update-customers');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customers  $customers
     * @return mixed
     */
    public function delete(User $user, Customers $customers)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('delete-customers');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customers  $customers
     * @return mixed
     */
    public function restore(User $user, Customers $customers)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('restore-customers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customers  $customers
     * @return mixed
     */
    public function forceDelete(User $user, Customers $customers)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('force-delete-customers');
    }
}
