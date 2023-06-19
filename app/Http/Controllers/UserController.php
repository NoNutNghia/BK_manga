<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        return $this->userService->login($request);
    }

    public function logout(Request $request)
    {
        return $this->userService->logout($request);
    }

    public function personalInformation(Request $request)
    {
        return $this->userService->personalInformation($request);
    }

    public function register(Request $request) {
        return $this->userService->register($request);
    }
}
