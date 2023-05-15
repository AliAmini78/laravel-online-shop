<?php

namespace Web\User\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return response()->json('salam');
    }
}
