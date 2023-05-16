<?php

namespace Web\Auth\Database\Repositories\Eloquents;

use Web\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Web\User\Models\User;

class AuthRepository implements AuthRepositoryInterface
{

    private $model ;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
