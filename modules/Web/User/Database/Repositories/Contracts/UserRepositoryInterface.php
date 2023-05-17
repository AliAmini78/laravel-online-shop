<?php

namespace Web\User\Database\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

    /**
     * method for get admin users
     * @return array|Collection
     */
    public function getAllAdmins(): Collection|array;
}
