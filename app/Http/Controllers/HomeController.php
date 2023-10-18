<?php

namespace App\Http\Controllers;

use App\Tap;
use App\Truyen;
use App\Truyen_tacgia;
use App\Truyen_theloai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truyen_new = Truyen::orderByDesc('created_at')->take(7)->get();
        $count = Truyen::count();

        if ($count >= 10) {
            $truyen_view = Truyen::orderByDesc('view')->take(10)->get();
            $truyen_update = Truyen::select('truyen.*')
                ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                ->orderByDesc('latest_tap_updated_at')
                ->distinct()
                ->take(11)
                ->get();
        } else {
            $truyen_view = Truyen::orderByDesc('view')->get();
            $truyen_update = Truyen::select('truyen.*')
                ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                ->orderByDesc('latest_tap_updated_at')
                ->distinct()
                ->get();
        }

        return view('pages.home.index', [
            'truyen_update' => $truyen_update,
            'truyen_new' => $truyen_new,
            'truyen_view' => $truyen_view,
        ]);
    }

    public function showTruyen($slug)
    {
        $truyen = Truyen::where('slug', $slug)->first();
        if ($truyen) {
            $truyen_same_tacgia = Truyen_tacgia::where('id_truyen', $truyen->id)->pluck('id_truyen')->toArray();
            return view('pages.truyen.show', [
                'truyen' => $truyen,
                'truyen_same_tacgia' => $truyen_same_tacgia,
            ]);
        } else {
            abort(405, 'Không tìm thấy truyện');
        }
    }

    public function showTap($slug, $id)
    {
        $tap = Tap::findOrFail($id);
        $truyen = Truyen::where('slug', $slug)->first();
        if ($truyen && $tap) {
            $truyen->view = $truyen->view + 1;
            $truyen->save();
            return view('pages.truyen.chapter', [
                'tap' => $tap,
                'truyen' => $truyen,
            ]);
        } else {
            abort(405, 'Không tìm thấy truyện');
        }
    }

    public function get_theloai($id){
        $arr_truyen = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
        return view('pages.danhsach.index', [
            'arr_truyen' => $arr_truyen,
        ]);
    }

    public function get_danhsach(Request $request)
    {
        if ($request->sort) {
            $sort = $request->sort;
            if($sort == 'update'){
                $truyen = Truyen::select('truyen.*')
                ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                ->orderByDesc('latest_tap_updated_at')
                ->distinct()
                ->paginate(24);
            }else if($sort == 'za'){
                $truyen = Truyen::orderByDesc('tentruyen')->get();
            }else if($sort == 'az'){
                $truyen = Truyen::orderBy('tentruyen')->get();
            }else if($sort == 'new'){
                $truyen = Truyen::orderByDesc('created_at')->get();
            }else if($sort == 'top'){
                $truyen = Truyen::orderByDesc('view')->get();
            }
        }else if($request->hoanthanh){
            $truyen = Truyen::where('status', 1)->get();
        }else if($request->dangtienhanh){
            $truyen = Truyen::where('status', 0)->get();
        }else{
            $truyen = Truyen::all();
        }

        return view('pages.danhsach.index', [
            'truyen' => $truyen,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
