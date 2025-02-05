<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        $user->delete();

        return to_route('home');
    }
}
