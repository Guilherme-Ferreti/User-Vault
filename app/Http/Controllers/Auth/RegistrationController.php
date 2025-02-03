<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class RegistrationController extends Controller
{
    public function create(): Response
    {
        return inertia('Auth\Register');
    }

    public function store(StoreRegistrationRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return to_route('home');
    }
}
