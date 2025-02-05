<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;

class RegistrationController extends Controller
{
    public function create(): Response
    {
        return inertia('Auth\Register');
    }

    public function store(StoreRegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::disk('public')->put('avatars', $request->file('avatar'));
        }

        $user = User::create($data);

        Auth::login($user);

        return to_route('dashboard')->with('message', [
            'type'    => 'success',
            'content' => 'Welcome to the <b>UserVault</b> app!',
        ]);
    }
}
