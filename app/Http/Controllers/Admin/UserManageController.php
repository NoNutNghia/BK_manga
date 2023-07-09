<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Admin\UserManageService;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    private UserManageService $userManageService;

    /**
     * @param UserManageService $userManageService
     */
    public function __construct(UserManageService $userManageService)
    {
        $this->userManageService = $userManageService;
    }

    public function getUserList(Request $request)
    {
        return $this->userManageService->getUserList($request);
    }

    public function getUserDetail(Request $request)
    {
        return $this->userManageService->getUserDetail($request);
    }

    public function updateStatusUser(Request $request)
    {
        return $this->userManageService->updateStatusUser($request);
    }
}
