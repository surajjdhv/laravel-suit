<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeletedUserController extends Controller
{
    public function index()
    {
        $deletedUsers = User::onlyTrashed()->get();
        return view('user.deleted')->withDeletedUsers($deletedUsers);
    }

    public function restore(User $deletedUser)
    {
        // dd($user);
        $deletedUser->restore();

        return redirect()->route('user.index');
    }
}
