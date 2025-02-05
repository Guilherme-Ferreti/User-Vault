<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function delete(User $user): bool
    {
        return $user->is_admin;
    }

    public function destroy(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('You do not have permission to delete this user.');
    }
}
