<?php

namespace App\Service\Admin;

use App\Enum\ResponseResult;
use App\Enum\UserStatus;
use App\Helper\MailHandleHelper;
use App\ResponseObject\ResponseObject;
use App\Service\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserManageService
{
    private UserRepository $userRepository;
    private MailHandleHelper $mailHandleHelper;

    /**
     * @param UserRepository $userRepository
     * @param MailHandleHelper $mailHandleHelper
     */
    public function __construct(
        UserRepository $userRepository,
        MailHandleHelper $mailHandleHelper
    )
    {
        $this->userRepository = $userRepository;
        $this->mailHandleHelper = $mailHandleHelper;
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

    public function getUserDetail(Request $request)
    {
        $foundUser = $this->userRepository->getUserByIDManage($request->id);

        if (!$foundUser) {

        }

        return view('pages.admin.account.detail', compact('foundUser'));
    }

    public function updateStatusUser(Request $request)
    {
        try {
            DB::beginTransaction();

            $userID = $request->id;
            $foundUser = $this->userRepository->getUserByIDManage($userID);

            if (!$foundUser) {
                return $this->getErrorMessage();
            }

            $userStatus = (int) $request->user_status;

            $checkUpdate = $this->userRepository->updateStatusUser($userID, $userStatus);

            if (!$checkUpdate) {
                return $this->getErrorMessage();
            }

            if ($userStatus == UserStatus::DISABLE) {
                $this->mailHandleHelper->sendBanMail($foundUser);
            } else {
                $this->mailHandleHelper->sendUnbanMail($foundUser);
            }

            if (Mail::failures()) {
                return $this->getErrorMessage();
            }

            DB::commit();

            $response = new ResponseObject(
                ResponseResult::SUCCESS,
                '',
                __('success_message.update_status_user')
            );

            return response()->json($response->responseObject());

        } catch (\Exception $e) {
            return $this->getErrorMessage();
        }
    }

    private function getErrorMessage()
    {
        DB::rollBack();

        $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_edit_status_user'));

        return response()->json($response->responseObject());
    }
}
