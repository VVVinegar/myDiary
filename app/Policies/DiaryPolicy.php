<?php

namespace App\Policies;

use App\Diary;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Diary  $diary
     * @return bool
     */
    public function destroy(User $user, Diary $diary)
    {
        return $user->id === $diary->user_id;
    }
}
