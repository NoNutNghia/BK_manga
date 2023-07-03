<?php

namespace App\Service;

use App\Enum\ResponseResult;
use App\Enum\UserRole;
use App\Enum\UserStatus;
use App\Helper\ImageHandleHelper;
use App\Helper\MailHandleHelper;
use App\ResponseObject\ResponseObject;
use App\Service\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

            if ($user->role == UserRole::ADMIN) {
                $loginResponse = new ResponseObject(true, 'admin', route('admin.manga.manage'));
            } else {
                $loginResponse = new ResponseObject(true, '', '');
            }
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

            $response = new ResponseObject(ResponseResult::SUCCESS, $createUser, __('success_message.verify_email_register'));

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

    public function checkExistEmail(Request $request)
    {
        $email = $request->email;

        $foundUser = $this->userRepository->getUserByEmail($email);

        if (!$foundUser) {
            $response = new ResponseObject(ResponseResult::FAILURE, 'error_email', __('error_message.not_exist_user'));

            return response()->json($response->responseObject());
        }

        if ($foundUser->user_status == UserStatus::NOT_ACTIVE) {
            $response = new ResponseObject(ResponseResult::FAILURE, 'error_email', __('error_message.cannot_forgot_password'));

            return response()->json($response->responseObject());
        }

        $check = $this->userRepository->updateUserPasswordResetToken($foundUser->id);

        if (!$check)
        {
            $response = new ResponseObject(ResponseResult::FAILURE, 'error_reset', __('error_message.cannot_reset_password'));

            return response()->json($response->responseObject());
        }

        $this->mailHandleHelper->sendForgotMail($foundUser);

        $response = new ResponseObject(ResponseResult::SUCCESS, '', __('success_message.verify_reset_password'));

        return response()->json($response->responseObject());
    }

    function resetPassword(Request $request)
    {
        $resetPasswordToken = $request->reset_password_token;

        if (!$resetPasswordToken) {
            return redirect()->route('error');
        }

        $foundUser = $this->userRepository->getUserByResetPasswordToken($resetPasswordToken);

        if (!$foundUser) {
            return redirect()->route('error');
        }

        if (Carbon::parse($foundUser->reset_password_token_expiry_at)->greaterThanOrEqualTo(Carbon::now())) {
            return view('pages.user.personal.reset_password', ['id' => $foundUser->id]);
        }

        return redirect()->route('error');
    }

    function postResetPassword(Request $request)
    {
        $newPassword = $request->new_password;
        $userID = $request->user_id;

        $updatePassword = $this->userRepository->updatePassword($newPassword, $userID);

        if (!$updatePassword) {
            $response = new ResponseObject(ResponseResult::FAILURE, '', __('error_message.cannot_reset_password'));
            return response()->json($response->responseObject());
        }

        $message = '<div><span>Change password successfully!</span></div>
                <div class="flex flex-row items-center justify-center gap-[1%]">
                    <span>
                        Now login and enjoy your moment with BK Manga
                    </span>
                <img width="8%" src="'. asset('storage/icon/pepesmile.ico') . '" alt=""> </div>';

        $response = new ResponseObject(ResponseResult::SUCCESS, 'content_main', $message);

        return response()->json($response->responseObject());
    }

    function postChangePassword(Request $request)
    {
        $currentPassword = $request->current_password;

        $foundUser = $this->userRepository->getUserByIdAndPassword(Auth::id(), $currentPassword);

        if (!$foundUser) {
            $response = new ResponseObject(ResponseResult::FAILURE, 'error_current_password', __('error_message.not_found_user_change_password'));

            return response()->json($response->responseObject());
        }

        $newPassword = $request->new_password;

        $update = $this->userRepository->changePassword($newPassword, Auth::id());

        if (!$update) {
            $response = new ResponseObject(ResponseResult::FAILURE, 'error_change_password', __('error_message.cannot_reset_password'));

            return response()->json($response->responseObject());
        }

        $response = new ResponseObject(ResponseResult::SUCCESS, '', __('success_message.change_password'));

        return response()->json($response->responseObject());
    }
}
