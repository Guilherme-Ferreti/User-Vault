<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserIndexResource;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $users = User::paginate(5, ['id', 'name', 'email', 'avatar', 'created_at']);

        return inertia('Home', [
            'users' => UserIndexResource::collection($users),
        ]);
    }
}
