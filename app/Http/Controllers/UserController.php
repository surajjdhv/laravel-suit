<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserStoreRequest;

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

    public function store(UserStoreRequest $request)
    {
        dump($request->all());
    }
}
