<?php

namespace App\Http\Controllers;

use App\Theloai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('isLogged');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderByDesc('id')->get();
        return view('pages.admin.theloai.index', ['theloai' => $theloai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tentheloai' => 'required',
            ],
            [
                'tentheloai.required' => 'Trường này không thể bỏ trống',
            ]
        );

        $tentheloai = trim($request->tentheloai);
        $check = Theloai::where('tentheloai', $tentheloai)->count();
        if ($check > 0) {
            return back()->with('fail', "Thể loại đã tồn tại");
        }

        $theloai = new Theloai();
        $theloai->tentheloai = $request->tentheloai;
        $theloai->mota = $request->mota;

        $theloai->save();
        return redirect('/admin/theloai-manager')->with('success', 'Thêm mới thành công');
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
        $theloai = Theloai::findOrFail($id);
        return view('pages.admin.theloai.edit', ['theloai' => $theloai]);
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
        $theloai = Theloai::findOrFail($id);
        $theloai->tentheloai = $request->tentheloai;
        $theloai->mota = $request->mota;

        $theloai->save();
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = Theloai::findOrFail($id);
        $theloai->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
