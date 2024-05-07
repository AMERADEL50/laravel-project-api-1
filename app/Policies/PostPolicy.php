<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

use App\Traits\Policy;

class PostPolicy
{
    // ---------------------- This function will be used in each PolicyClass -----------------------
    // ---------------------- So, we moved it to the App\Traits\Policy.php -----------------------

    // function checkUserAbilitis($abilities)
    // {
    //     $user_abilites = explode('|', Auth::user()->roles);

    //     return  count(array_intersect($user_abilites, $abilities)) > 0 ? true : false;
    // }


    // The Policy trait that contain the above method
    // use {traitName} is simillar to extend in classes
    use Policy;


    /**
     * Determine whether the user can view any models.
     */
    public function index(User $user): bool
    {
        $abilities = ['posts.all'];

        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function show(User $user, Post $post): bool
    {

        $abilities = ['posts.show'];

        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $abilities = ['posts.store'];

        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        $abilities = ['posts.update'];

        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        $abilities = ['posts.softdelete'];

        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        $abilities = ['posts.restore'];
        return $this->checkUserAbilitis($abilities);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        $abilities = ['posts.delete'];
        return $this->checkUserAbilitis($abilities);
    }

    public function pending(User $user): bool
    {
        $abilities = ['posts.pending'];

        return $this->checkUserAbilitis($abilities);
    }
}
