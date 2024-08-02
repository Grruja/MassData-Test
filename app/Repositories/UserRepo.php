<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepo
{
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function search(string $searchValue): LengthAwarePaginator
    {
        return $this->userModel->where('name', 'like', '%'.$searchValue.'%')
                    ->orWhere('email', 'like', '%'.$searchValue.'%')
                    ->paginate();
    }
}
