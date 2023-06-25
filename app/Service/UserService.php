<?php

namespace App\Service;

use App\Enum\ResponseResult;
use App\Helper\ImageHandleHelper;
use App\Helper\MailHandleHelper;
use App\ResponseObject\ResponseObject;
use App\Service\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private UserRepository $userRepository;
    private ImageHandleHelper $imageHandleHelper;
    private MailHandleHelper $mailHandleHelper;

    /**
     * @param UserRepository $userRepository
     * @param ImageHandleHelper $imageHandleHelper
     * @param MailHandleHelper $mailHandleHelper
     */
    public function __construct(
        UserRepository $userRepository,
        ImageHandleHelper $imageHandleHelper,
        MailHandleHelper $mailHandleHelper
    )
    {
        $this->userRepository = $userRepository;
        $this->imageHandleHelper = $imageHandleHelper;
        $this->mailHandleHelper = $mailHandleHelper;
    }

    public function login(Request $request)
    {
        $password = sha1($request->password);
        $login_id = $request->login_id;

        $user = $this->userRepository->getUser($login_id, $password);

        if ($user) {

            Auth::login($user);

            $loginResponse = new ResponseObject(true, '', '');

            return response()->json($loginResponse->responseObject());
        }

        $loginResponse = new ResponseObject(false, '', __('error_message.login_error'));

        return response()->json($loginResponse->responseObject());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->back();
    }

    public function personalInformation(Request $request)
    {
        $foundUser = $this->userRepository->getUserById($request->id);

        return view('pages.user.personal.information', compact('foundUser'));
    }

    public function register(Request $request)
    {
        try {
            $nick_name = $request->nick_name;
            $login_id = $request->login_id;

            $foundUser = $this->userRepository->getUserByEmailOrNickname($login_id, $nick_name);

            if ($foundUser) {
                if ($foundUser->nick_name == $nick_name) {
                    $response = new ResponseObject(
                        ResponseResult::FAILURE,
                        'nick_name_error',
                        __('error_message.nick_name_exist')
                    );

                    return response()->json($response->responseObject());
                }

                if ($foundUser->email == $login_id) {
                    $response = new ResponseObject(
                        ResponseResult::FAILURE,
                        'email_error',
                        __('error_message.email_exist')
                    );

                    return response()->json($response->responseObject());
                }
            }

            $createUser = $this->userRepository->createUser($request);

            if (!$createUser) {
                $response = new ResponseObject(
                    ResponseResult::FAILURE,
                    'register_error',
                    __('error_message.register_user')
                );

                return response()->json($response->responseObject());
            }

            $this->mailHandleHelper->sendRegisterMail($createUser);

            $this->imageHandleHelper->genNewAvatarUser($createUser->id);

            $response = new ResponseObject(ResponseResult::SUCCESS, $createUser, '');

            return response()->json($response->responseObject());
        } catch (\Exception $e) {
            $response = new ResponseObject(
                ResponseResult::FAILURE,
                'register_error',
                __('error_message.register_user')
            );

            return response()->json($response->responseObject());
        }

    }

    public function changeInformation(Request $request)
    {
        try {
            $existIDUser = $this->userRepository->getExistUserByNickName($request->nick_name);

            $base64StringFile = $request->string_file;

            if ($existIDUser && $existIDUser->id != Auth::id()) {
                $response = new ResponseObject(ResponseResult::FAILURE, 'info_nick_name_error', __('error_message.nick_name_exist'));

                return response()->json($response->responseObject());
            }

            $updateUser = $this->userRepository->changePersonalInformation(Auth::user(), $request);

            if (!$updateUser) {
                $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.update_personal_information'));

                return response()->json($response->responseObject());
            }

            if ($base64StringFile) {
                $this->imageHandleHelper->uploadImage($base64StringFile);
            }

            $response = new ResponseObject(ResponseResult::SUCCESS, '', __('success_message.change_personal_information'));

            return response()->json($response->responseObject());
        } catch (\Exception $e) {
            $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.update_personal_information'));

            return response()->json($response->responseObject());
        }
    }

    public function verifyEmail(Request $request)
    {

        $emailVerifyToken = $request->email_verify_token;

        if (!$emailVerifyToken) {
            return redirect()->route('error');
        }

        $foundUser = $this->userRepository->getUserByEmailVerifyToken($emailVerifyToken);

        if (!$foundUser) {
            return redirect()->route('error');
        }

        $checkTime = Carbon::parse($foundUser->email_verify_token_expiry_at)->greaterThanOrEqualTo(Carbon::now());

        if ($checkTime) {
            $checkActive = $this->userRepository->activeUser($foundUser->id);

            if (!$checkActive) {
                return redirect()->route('verify_error');
            }

            return redirect()->route('verify_result');
        }

        return redirect()->route('verify_error');
    }

    public function verifyResult(Request $request)
    {
        return view('partial.verify_email');
    }
}
