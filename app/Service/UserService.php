<?php

namespace App\Service;

use App\ResponseObject\ResponseObject;
use App\Service\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $password = sha1($request->password);
        $login_id = $request->login_id;

        $user = $this->userRepository->getUser($login_id, $password);

//        if (!$user) {
//            return response()->json(array(
//                'login_id' => $request->login_id,
//                'password' => $password
//            ));
//        }

        if ($user) {

            Auth::login($user);

            $loginResponse = new ResponseObject(true, '', '');

            return response()->json($loginResponse->responseObject());
        }

        $loginResponse = new ResponseObject(false, '', '');

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

        if (!$foundUser) {

        }

        return view('pages.user.personal.information', compact('foundUser'));
    }
}
