<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('public.profile');
    }

    public function update()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return view('public.updateProfile', compact('user'));
    }
}
