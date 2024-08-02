<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function allUsersList(): View
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }
}
