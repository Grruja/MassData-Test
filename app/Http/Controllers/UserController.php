<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
        $this->userRepo->createUser($request);
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

    public function updateUser(User $user, UpdateUserRequest $request): RedirectResponse
    {
        $this->userRepo->updateUser($request, $user);
        return redirect()->route('users.all')->with('success', 'User updated!');
    }

    public function deleteUser(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.all')->with('success', 'User deleted!');
    }

    public function searchUsers(Request $request): View
    {
        $searchValue = $request->get('search_value');
        $users = $this->userRepo->searchUsers($searchValue);

        return view('users.table', compact('users'));
    }
}
