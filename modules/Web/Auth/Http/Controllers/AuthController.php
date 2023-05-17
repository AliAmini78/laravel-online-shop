<?php

namespace Web\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Web\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Web\Auth\Http\Requests\LoginRequest;
use Web\Auth\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository  = $authRepository;
    }

    /**
     * page for showing register input
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function registerPage(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("Auth::register");
    }


    /**
     * method for register new user
     * @param RegisterRequest $request
     * @return Application|\Illuminate\Contracts\Foundation\Application|RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $result = $this->authRepository->register($request->validated());

        return redirect()->route('home')->with('success_message' , __('messages.register_success'));
    }

    /**
     * page for login user
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function loginPage(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("Auth::login");
    }

    /**
     * methode for login the user
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function login(LoginRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $result = $this->authRepository->login($request->validated());

        if ($result)
        return redirect()->route('home')->with('success_message' ,  __("messages.login_success"));

            return redirect()->route('login')->with('error_message' , __("messages.login_error"));
    }

    /**
     * logout the user
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function logOut(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();

        return redirect()->route('home')->with('success_message' , __("messages.logout_success"));
    }
}
