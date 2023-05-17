<?php

namespace Web\Auth\Database\Repositories\Eloquents;

use Illuminate\Support\Facades\Auth;
use Web\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Web\User\Models\User;

class AuthRepository implements AuthRepositoryInterface
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * method for register
     * @param array $inputs
     * @return mixed
     */
    public function register(array $inputs): mixed
    {

        $newUser = $this->model->newQuery()
            ->create($inputs);

        Auth::login($newUser);

        return $newUser;
    }

    /**
     * method for register
     * @param array $inputs
     * @return mixed
     */
    public function login(array $inputs): mixed{
        $result = Auth::attempt($inputs);


        if ($result){
            $user = $this->model
                ->newQuery()
                ->where('email' , $inputs['email'])
                ->first();
            Auth::login($user);

            return $result;
        }

        return $result;




    }
}
