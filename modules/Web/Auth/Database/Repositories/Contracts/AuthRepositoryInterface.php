<?php

namespace Web\Auth\Database\Repositories\Contracts;

interface AuthRepositoryInterface
{
    /**
     * method for register
     * @param array $inputs
     * @return mixed
     */
    public function register(array $inputs): mixed;

    /**
     * method for register
     * @param array $inputs
     * @return mixed
     */
    public function login(array $inputs): mixed;
}
