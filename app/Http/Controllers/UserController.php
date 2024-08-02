<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\UserRepo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserRepo $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepo();
    }

    public function createUser(CreateUserRequest $request): RedirectResponse
    {
        $this->userRepo->create($request);
        return redirect()->route('users.all')->with('success', 'User created!');
    }

    public function allUsersList(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate();
        return view('users.table', compact('users'));
    }

    public function editUser(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function searchUsers(Request $request): View
    {
        $searchValue = $request->get('search_value');
        $users = $this->userRepo->search($searchValue);

        return view('users.table', compact('users'));
    }
}
