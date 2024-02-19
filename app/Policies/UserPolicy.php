<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //index page
        return $user->roles()->where('id', Role::IS_ADMIN)->exists();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //show specific user
        //mit dem 2. Parameter könnte man noch definieren dass ein anderer User seine eigenen Daten editieren könnte
        //ist aber hinfällig, da ohnehin nur der Admin hinein kommt.
        return $user->roles()->where('id', Role::IS_ADMIN)->exists();

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //edit / create
        return $user->roles()->where('id', Role::IS_ADMIN)->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //edit /update
        return $user->roles()->where('id', Role::IS_ADMIN)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // destroy
        return $user->roles()->where('id', Role::IS_ADMIN)->exists();
    }

}
