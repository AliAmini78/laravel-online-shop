<?php

namespace Web\User\Database\Repositories\Eloquents;

use Illuminate\Database\Eloquent\Collection;
use Web\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Web\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * method for get admin users
     * @return array|Collection
     */
    public function getAllAdmins(): array|Collection
    {
        return  $this->model
            ->newQuery()
            ->where('is_admin' , 1)
            ->get();
    }
}
