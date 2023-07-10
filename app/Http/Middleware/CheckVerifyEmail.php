<?php

namespace App\Http\Middleware;

use App\Enum\ResponseResult;
use App\ResponseObject\ResponseObject;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_null(Auth::user()->email_verify_at)) {
            if (\request()->ajax()) {

                $response = new ResponseObject(
                    ResponseResult::FAILURE,
                    '',
                    __('error_message.not_verify_email')
                );

                return response()->json($response->responseObject());
            }
        }

        return $next($request);
    }
}
