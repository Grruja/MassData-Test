<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserRepo $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepo();
    }

    public function allUsersList(): View
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function searchUsers(Request $request): View
    {
        $searchValue = $request->get('search_value');
        $users = $this->userRepo->search($searchValue);

        return view('users.index', compact('users'));
    }
}
