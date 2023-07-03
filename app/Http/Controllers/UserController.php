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

    public function changeInformationUser(Request $request)
    {
        return $this->userService->changeInformation($request);
    }

    public function verifyEmail(Request $request)
    {
        return $this->userService->verifyEmail($request);
    }

    public function verifyResult(Request $request)
    {
        return $this->userService->verifyResult($request);
    }

    public function checkExistEmail(Request $request)
    {
        return $this->userService->checkExistEmail($request);
    }

    function resetPassword(Request $request)
    {
        return $this->userService->resetPassword($request);
    }

    function postResetPassword(Request $request)
    {
        return $this->userService->postResetPassword($request);
    }

}
