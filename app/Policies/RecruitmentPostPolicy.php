<?php

namespace App\Policies;

use App\Models\RecruitmentPost;
use App\Models\User;

class RecruitmentPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RecruitmentPost $recruitmentPost): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RecruitmentPost $recruitmentPost): bool
    {
        return $user->id === $recruitmentPost->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RecruitmentPost $recruitmentPost): bool
    {
        return $user->id === $recruitmentPost->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RecruitmentPost $recruitmentPost): bool
    {
        return $user->id === $recruitmentPost->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RecruitmentPost $recruitmentPost): bool
    {
        return $user->id === $recruitmentPost->user_id;
    }
}
