<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Session;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Bạn phải đăng nhập trước!');
        } else {
            $user = User::findOrFail(Session::get('loginId'));
            if ($user->role != 'admin') {
                abort('403', 'Bạn không có quyền truy cập!');
            }
        }
        return $next($request);
    }
}
