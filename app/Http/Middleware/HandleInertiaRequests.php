<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'is_authenticated' => Auth::check(),
                'user'             => fn () => $this->sharebleUserData(),
            ],
        ]);
    }

    /**
     * The user data that can be safely shared to the frontend.
     */
    private function sharebleUserData(): ?array
    {
        if (Auth::guest()) {
            return [];
        }

        /** @var User $user */
        $user = Auth::user();

        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'avatar' => $user->avatar(),
        ];
    }
}
