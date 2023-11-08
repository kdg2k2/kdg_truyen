<?php

namespace App\Http\Controllers;

use App\Tap;
use App\Theodoi;
use App\Thongbao;
use App\Truyen;
use Illuminate\Http\Request;

class TapController extends Controller
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
        $tap = Tap::orderByDesc('id')->get();
        return view('pages.admin.tap.index', ['tap' => $tap]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::all();
        return view('pages.admin.tap.create', ['truyen' => $truyen]);
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
            'tentap' => 'required',
            'id_truyen' => 'required',
            'path' => 'required',
        ], [
            'tentap.required' => 'Trường này không thể bỏ trống',
            'id_truyen.required' => 'Trường này không thể bỏ trống',
            'path.required' => 'Trường này không thể bỏ trống',
        ]);

        $tentap = trim($request->tentap);
        $check = Tap::where('tentap', $tentap)->where('id_truyen', $request->id_truyen)->count();
        if ($check > 0) {
            return back()->with('fail', "Tập này đã tồn tại");
        }

        $tap = new Tap();
        $tap->tentap = $request->tentap;
        $tap->id_truyen = $request->id_truyen;
        
        $imagePaths = [];
        if (($request->file('path')) != null) {
            $path = $request->file('path');
            foreach ($path as $img) {
                $filename = time() . $img->getClientOriginalName();
                $img->move('truyen/' . $request->id_truyen . '/' . $request->tentap, $filename);
                $imgPath = 'truyen/' . $request->id_truyen . '/' . $request->tentap . '/' . $filename;

                $imagePaths[] = $imgPath;
            }
            $tap->path = json_encode($imagePaths);
        } else {
            $tap->path = null;
        }
        $tap->save();

        $theodoi = Theodoi::where('id_truyen', $request->id_truyen)->pluck('id_user')->toArray();
        foreach ($theodoi as $item) {
            $tb = new Thongbao();
            $tb->id_user = $item;
            $tb->id_tap = Tap::max('id');
            $tb->noidung = Truyen::findOrFail($request->id_truyen)->tentruyen . ' vừa ra chương mới '. '"'.$request->tentap.'"';
            $tb->save();
        }

        return redirect('/admin/tap-manager')->with('success', 'Thêm mới thành công');
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
        $tap = Tap::findOrFail($id);
        $truyen = Truyen::all();
        return view('pages.admin.tap.edit', ['tap' => $tap, 'truyen' => $truyen]);
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
            'tentap' => 'required',
            'id_truyen' => 'required',
        ], [
            'tentap.required' => 'Trường này không thể bỏ trống',
            'id_truyen.required' => 'Trường này không thể bỏ trống',
        ]);

        $tap = Tap::findOrFail($id);
        $tap->tentap = $request->tentap;
        $tap->id_truyen = $request->id_truyen;
        // $tap->path = $request->path;
        $imagePaths = [];
        if (($request->file('path')) != null) {
            $path = $request->file('path');

            if ($tap->path != null) {
                $json_decode_path = json_decode($tap->path);
                foreach ($json_decode_path as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }

            foreach ($path as $img) {
                $filename = time() . $img->getClientOriginalName();
                $img->move('truyen/' . $request->id_truyen . '/' . $request->tentap, $filename);
                $imgPath = 'truyen/' . $request->id_truyen . '/' . $request->tentap . '/' . $filename;

                $imagePaths[] = $imgPath;
            }
            $tap->path = json_encode($imagePaths);
        }
        $tap->save();

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
        $tap = Tap::findOrFail($id);
        if ($tap->path != null) {
            $json_decode_path = json_decode($tap->path);
            foreach ($json_decode_path as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }
        $tap->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
