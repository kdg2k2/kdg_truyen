<?php

namespace App\Http\Controllers;

use App\Tacgia;
use Illuminate\Http\Request;

class TacgiaController extends Controller
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
        $tacgia = Tacgia::orderByDesc('id')->get();
        return view('pages.admin.tacgia.index', ['tacgia' => $tacgia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tacgia.create');
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
            'tentacgia' => 'required',
        ], [
            'tentacgia.required' => 'Trường này không thể bỏ trống',
        ]);

        $tentacgia = trim($request->tentacgia);
        $check = Tacgia::where('tentacgia', $tentacgia)->count();
        if ($check > 0) {
            return back()->with('fail', "Tác giả đã tồn tại");
        }

        $tacgia = new Tacgia();
        $tacgia->tentacgia = $request->tentacgia;
        $tacgia->save();

        return redirect('/admin/tacgia-manager')->with('success', 'Thêm mới thành công');
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
        $tacgia = Tacgia::findOrFail($id);
        return view('pages.admin.tacgia.edit', ['tacgia' => $tacgia]);
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
            'tentacgia' => 'required',
        ], [
            'tentacgia.required' => 'Trường này không thể bỏ trống',
        ]);

        $tacgia = Tacgia::findOrFail($id);
        $tacgia->tentacgia = $request->tentacgia;
        $tacgia->save();

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
        $tacgia = Tacgia::findOrFail($id);
        $tacgia->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
