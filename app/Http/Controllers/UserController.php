<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->withUsers($users);
    }

    public function show(User $user)
    {
        return view('user.show')->withUser($user);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = $request->is_active;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.show', $user);
    }

    public function edit(User $user)
    {
        return view('user.edit')->withUser($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = $request->is_active;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.show', $user);
    }
}
