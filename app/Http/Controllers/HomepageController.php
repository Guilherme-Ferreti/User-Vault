<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserIndexResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::query()
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%'),
            )
            ->orderByDesc('created_at')
            ->paginate(5, ['id', 'name', 'email', 'avatar', 'created_at'])
            ->withQueryString();

        return inertia('Home', [
            'users'      => UserIndexResource::collection($users),
            'searchTerm' => $request->search,
        ]);
    }
}
