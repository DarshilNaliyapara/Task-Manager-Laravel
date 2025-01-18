<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, Task $task): bool
    {
        return $task->user->is($user);
    }
    public function destroy(User $user, Task $task): bool
    {
        return $task->user->is($user);
    }
}
