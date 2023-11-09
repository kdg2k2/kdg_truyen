<?php

namespace App\Http\Controllers;

use App\Binhluan;
use App\Dislike;
use App\Like;
use App\Theloai;
use App\Theodoi;
use App\Truyen;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        $previousUrl = url()->previous();
        session(['redirect_url' => $previousUrl]);

        return view('pages.login.login');
    }

    public function register()
    {
        return view('pages.register.register');
    }

    public function post_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
            're_password' => 'required',
        ], [
            'email.required' => 'Nhập email để đăng kí',
            'email.email' => 'Vui lòng nhập đúng định dạng email (gồm @gmail.com .v.v)',
            'email.unique' => 'Email đã đc đăng ký trước đó',
            'username.required' => 'Trường này không thể bỏ trống',
            'password.required' => 'Trường này không thể bỏ trống',
            're_password.required' => 'Trường này không thể bỏ trống',
        ]);

        if ($request->password != $request->re_password) {
            return back()->with('fail', 'Mật khẩu và nhập lại mật khẩu chưa chính xác');
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';

        $user->save();
        return back()->with('success', 'Đăng kí thành công');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                if ($user->role == 'admin') {
                    return redirect('/logged');
                } else {
                    if (session()->has('redirect_url')) {
                        $redirectUrl = session('redirect_url');
                        session()->forget('redirect_url');
                        return redirect($redirectUrl);
                    }
                    return redirect('/');
                }
            } else {
                return back()->with('fail', 'Sai tài khoản hoặc mật khẩu');
            }
        } else {
            return back()->with('fail', 'Email này chưa được đăng kí trong hệ thống');
        }
    }

    public function forget()
    {
        return view('pages.forgetpassword.forgetpassword');
    }

    public function forgetPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ], [
            'email.required' => 'Nhập địa chỉ email bạn đã đăng kí để lấy lại mật khẩu',
            'email.email' => 'Vui lòng nhập 1 địa chỉ email hợp lệ (@gmail.com ..v.v)',
            'email.exists' => 'Địa chỉ email không tồn tại trong hệ thống',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = strtoupper(Str::random(20));
            $user->update(['token' => $token, 'token_created_at' => now()]);
            Mail::send('pages.email.forget_password', ['user' => $user], function ($email) use ($user) {
                $email->subject('Giống Lâm Nghiệp - Lấy lại mật khẩu');
                $email->to($user->email, $user->username);
            });
            return back()->with('success', 'Đường dẫn xác thực chỉ hiệu lực trong 3 phút. Kiểm tra email của bạn để lấy lại mật khẩu!');
        }
    }

    public function getPass($id, $token)
    {
        $user = User::findOrFail($id);
        if ($user->token === $token) {
            return view('pages.forgetpassword.getPass', ['id' => $id, 'token' => $token]);
        }
        return abort(404);
    }

    public function postGetPass($id, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            're-password' => 'required',
        ], [
            'password.required' => 'Nhập mật khẩu',
            're-password.required' => 'Nhập lại mật khẩu',
        ]);

        $pass = $request->input('password');
        $re_pass = $request->input('re-password');
        if ($pass != $re_pass) {
            return back()->with('fail', 'Mật Khẩu và Nhập Lại Mật Khẩu không được khác nhau!');
        }

        $user = User::findOrFail($id);
        if (!$user) {
            return back()->with('fail', 'Không tìm thấy user');
        } else {
            if ($user->token === $token) {
                $expiryTime = now()->subMinutes(3);
                if ($user->token_created_at < $expiryTime) {
                    return redirect('/forget-password')->with('fail', 'Token đã hết hạn. Vui lòng yêu cầu đổi mật khẩu lại.');
                }

                $user->password = Hash::make($request->password);
                $user->token = null;
                $user->token_created_at = null;
                $user->save();
                return redirect('/login')->with('success', 'Đổi mật khẩu thành công');
            } else {
                return abort(404);
            }
        }
    }

    public function logged()
    {
        $theloai = Theloai::select('theloai.tentheloai', DB::raw('COUNT(truyen_theloai.id_truyen) as so_luong'))
            ->leftJoin('truyen_theloai', 'theloai.id', '=', 'truyen_theloai.id_theloai')
            ->groupBy('theloai.tentheloai')
            ->get();
        $theloaiData = [];
        foreach ($theloai as $data) {
            $theloaiData['labels'][] = $data->tentheloai;
            $theloaiData['data'][] = $data->so_luong;
        }
            
        $max_view = Truyen::orderByDesc('view')->first();

        $id_max_td = Theodoi::select('id_truyen', DB::raw('COUNT(*) as total_td'))
            ->groupBy('id_truyen')
            ->orderByDesc('total_td')
            ->first();

        $id_max_bl = Binhluan::select('id_truyen', DB::raw('COUNT(*) as total_bl'))
            ->groupBy('id_truyen')
            ->orderByDesc('total_bl')
            ->first();

        $id_max_like = Like::select('id_truyen', DB::raw('COUNT(*) as total_like'))
            ->groupBy('id_truyen')
            ->orderByDesc('total_like')
            ->first();

        $id_max_dislike = Dislike::select('id_truyen', DB::raw('COUNT(*) as total_dislike'))
            ->groupBy('id_truyen')
            ->orderByDesc('total_dislike')
            ->first();

        $max_td_id = null;
        $max_bl_id = null;
        $max_like_id = null;
        $max_dislike_id = null;

        if ($id_max_td) {
            $max_td_id = $id_max_td->id_truyen;
        }

        if ($id_max_bl) {
            $max_bl_id = $id_max_bl->id_truyen;
        }

        if ($id_max_like) {
            $max_like_id = $id_max_like->id_truyen;
        }

        if ($id_max_dislike) {
            $max_dislike_id = $id_max_dislike->id_truyen;
        }

        $max_td = Truyen::find($max_td_id);
        $max_bl = Truyen::find($max_bl_id);
        $max_like = Truyen::find($max_like_id);
        $max_dislike = Truyen::find($max_dislike_id);

        // dd($max_td,
        // $max_bl,
        // $max_like,
        // $max_dislike);

        return view('pages.admin.home.index', [
            'max_td' => $max_td,
            'max_bl' => $max_bl,
            'max_like' => $max_like,
            'max_dislike' => $max_dislike,
            'max_view' => $max_view,
            'theloaiData' => $theloaiData,
        ]);
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return back();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderByDesc('id')->get();
        return view('pages.admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Nhập email để đăng kí',
            'email.email' => 'Vui lòng nhập đúng định dạng email (gồm @gmail.com .v.v)',
            'email.unique' => 'Mỗi email chỉ được đăng kí cho 1 user',
            'username.required' => 'Trường này không thể bỏ trống',
            'password.required' => 'Trường này không thể bỏ trống',
        ]);

        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            return back()->with('fail', 'Tài khoản hoặc email đã đăng ký trước đó');
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();
        return redirect('/admin/user-manager')->with('success', 'Đăng kí thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'username' => 'required',
        ], [
            'email.required' => 'Nhập email để đăng kí',
            'email.email' => 'Vui lòng nhập đúng định dạng email (gồm @gmail.com .v.v)',
            'username.required' => 'Trường này không thể bỏ trống',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return back()->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
