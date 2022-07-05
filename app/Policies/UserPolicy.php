<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $accesses = $user->roles->accesses;

        foreach ($accesses as $access) {
            if (strcmp($access->code, 'user_view') === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function view(User $user)
    {
        $accesses = $user->roles->accesses;

        foreach ($accesses as $access) {
            if (strcmp($access->code, 'user_branch_access_view') === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $accesses = $user->roles->accesses;

        foreach ($accesses as $access) {
            if (strcmp($access->code, 'user_add') === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function update(User $user)
    {
        $accesses = $user->roles->accesses;

        foreach ($accesses as $access) {
            if (strcmp($access->code, 'user_branch_access_add') === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
