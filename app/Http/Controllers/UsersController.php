<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['notifications']);
        
    }

    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications', [
            'notifications' => auth()->user()->notifications()->paginate(env('ITEMS_PER_PAGE')),
        ]);
    }
}
