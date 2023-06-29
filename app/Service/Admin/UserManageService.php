<?php

namespace App\Service\Admin;

use App\Service\Repository\UserRepository;
use Illuminate\Http\Request;

class UserManageService
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserList(Request $request)
    {
        $key = '%';
        if (isset($request->key)) {
            $searchKey = str_replace('%', '\%', trim($request->key));
            $key .= $searchKey;
        }

        $key .= '%';

        $userList = $this->userRepository->getUserList($key);

        return view('pages.admin.account.manage', compact('userList'));
    }
}
