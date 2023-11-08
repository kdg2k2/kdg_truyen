<?php

namespace App\Http\Controllers;

use App\Tacgia;
use App\Tap;
use App\Theloai;
use App\Truyen;
use App\Truyen_tacgia;
use App\Truyen_theloai;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truyen = Truyen::orderByDesc('id')->get();
        return view('pages.admin.truyen.index', ['truyen' => $truyen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tacgia = Tacgia::all();
        $theloai = Theloai::all();
        return view('pages.admin.truyen.create', ['tacgia' => $tacgia, 'theloai' => $theloai]);
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
            'tentruyen' => 'required',
            'path' => 'required',
            'slug' => 'required',
        ]);

        $tentruyen = trim($request->tentruyen);
        $check = Truyen::where('tentruyen', $tentruyen)->count();
        if ($check > 0) {
            return back()->with('fail', "Truyện đã tồn tại");
        }

        $truyen = new Truyen();
        $truyen->tentruyen = $request->tentruyen;
        $truyen->slug = $request->slug;
        $truyen->mota = $request->mota;
        $truyen->status = $request->status;
        $truyen->tenkhac = $request->tenkhac;
        $truyen->view = 0;
        $truyen->save();

        if ($request->file('path')) {
            $image = $request->file('path');
            $filename = time() . '_avt_' . $image->getClientOriginalName();
            $lastID = Truyen::max('id');
            $image->move('truyen/' . $lastID, $filename);
            $truyen->path = 'truyen/' . $lastID . '/' . $filename;
            $truyen->save();
        }

        for ($i = 0; $i < count($request->tacgia); $i++) {
            $tr_tg = new Truyen_tacgia();
            $tr_tg->id_tacgia = $request->tacgia[$i];
            $tr_tg->id_truyen = Truyen::max('id');
            $tr_tg->save();
        }

        for ($i = 0; $i < count($request->theloai); $i++) {
            $tr_tl = new Truyen_theloai();
            $tr_tl->id_theloai = $request->theloai[$i];
            $tr_tl->id_truyen = Truyen::max('id');
            $tr_tl->save();
        }

        return redirect('/admin/truyen-manager')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truyen = Truyen::findOrFail($id);
        $truyen->view = max($truyen->view) + 1;
        $truyen->save();
        return view('pages.admin.truyen.show', ['truyen' => $truyen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tacgia = Tacgia::all();
        $theloai = Theloai::all();
        $truyen = Truyen::findOrFail($id);
        $arr_tacgia = Truyen_tacgia::where('id_truyen', $id)->pluck('id_tacgia')->toArray();
        $arr_theloai = Truyen_theloai::where('id_truyen', $id)->pluck('id_theloai')->toArray();
        return view('pages.admin.truyen.edit', [
            'truyen' => $truyen,
            'tacgia' => $tacgia,
            'theloai' => $theloai,
            'arr_tacgia' => $arr_tacgia,
            'arr_theloai' => $arr_theloai,
        ]);
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
            'tentruyen' => 'required',
        ]);

        $truyen = Truyen::findOrFail($id);
        $truyen->tentruyen = $request->tentruyen;
        $truyen->mota = $request->mota;
        $truyen->status = $request->status;
        $truyen->tenkhac = $request->tenkhac;

        if ($request->file('path')) {
            if ($truyen->path != null) {
                if (file_exists(public_path($request->hidden_image))) {
                    unlink(public_path($request->hidden_image));
                }
            }

            $image = $request->file('path');
            $filename = time() . '_avt_' . $image->getClientOriginalName();
            $image->move('truyen/' . $id, $filename);
            $truyen->path = 'truyen/' . $id . '/' . $filename;
        }
        $truyen->save();

        $arr_tacgia = Truyen_tacgia::where('id_truyen', $id)->get();
        if (count($arr_tacgia) > 0) {
            foreach ($arr_tacgia as $item) {
                $item->delete();
            }
        }

        $arr_theloai = Truyen_theloai::where('id_truyen', $id)->get();
        if (count($arr_theloai) > 0) {
            foreach ($arr_theloai as $item) {
                $item->delete();
            }
        }

        for ($i = 0; $i < count($request->tacgia); $i++) {
            $tr_tg = new Truyen_tacgia();
            $tr_tg->id_tacgia = $request->tacgia[$i];
            $tr_tg->id_truyen = $id;
            $tr_tg->save();
        }

        for ($i = 0; $i < count($request->theloai); $i++) {
            $tr_tl = new Truyen_theloai();
            $tr_tl->id_theloai = $request->theloai[$i];
            $tr_tl->id_truyen = $id;
            $tr_tl->save();
        }

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
        $truyen = Truyen::findOrFail($id);
        if ($truyen->path != null) {
            if (file_exists(public_path($truyen->path))) {
                unlink(public_path($truyen->path));
            }
        }

        $arr_tap = Tap::where('id_truyen', $truyen->id)->pluck('id')->toArray();
        foreach($arr_tap as $i){
            $tap = Tap::findOrFail($i);
            if ($tap->path != null) {
                $json_decode_path = json_decode($tap->path);
                foreach ($json_decode_path as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }
            $tap->delete();
        }

        $truyen->delete();
        return back()->with('success', 'Xoá thành công');
    }
}
