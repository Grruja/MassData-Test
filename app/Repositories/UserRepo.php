<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepo
{
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function create(Request $request): void
    {
        $this->userModel->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }

    public function search(string $searchValue): LengthAwarePaginator
    {
        return $this->userModel->where('name', 'like', '%'.$searchValue.'%')
                    ->orWhere('email', 'like', '%'.$searchValue.'%')
                    ->paginate();
    }
}
