<?php

namespace App\Http\Middleware;

use App\Enum\UserStatus;
use App\ResponseObject\ResponseObject;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse|
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax() && !Auth::check())
        {
            $response = new ResponseObject(false, '', 'You must login first!');
            return response()->json($response->responseObject());
        }

        if (Auth::check() && Auth::user()->user_status == UserStatus::DISABLE) {
            Auth::logout();
            return redirect()->route('main');
        }

        if (!Auth::check())
        {
            return redirect()->route('main');
        }

        return $next($request);
    }
}
