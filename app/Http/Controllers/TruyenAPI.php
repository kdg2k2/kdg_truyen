<?php

namespace App\Http\Controllers;

use App\Tacgia;
use App\Tap;
use App\Theloai;
use App\Truyen;
use App\Truyen_tacgia;
use App\Truyen_theloai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruyenAPI extends Controller
{
    public function category()
    {
        $theloai = Theloai::all();
        return response()->json($theloai);
    }

    public function list()
    {
        $truyen = Truyen::orderBy('id')->get();
        return response()->json($truyen);
    }

    public function listFilter($id)
    {
        $truyen = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
        $arr_truyen = [];
        foreach ($truyen as $item) {
            $findTruyen = Truyen::findOrFail($item);
            array_push($arr_truyen, $findTruyen);
        }
        return response()->json($arr_truyen);
    }

    public function home()
    {
        // $truyen_new = Truyen::orderByDesc('created_at')->get();
        $count = Truyen::count();
        if ($count >= 10) {
            $truyen_view = Truyen::orderByDesc('view')->take(10)->get();
            $truyen_update = Truyen::select('truyen.*')
                ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                ->orderBy('latest_tap_updated_at')
                ->distinct()
                ->take(12)
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
        return response()->json([
            'truyen_view' => $truyen_view,
            'truyen_update' => $truyen_update,
        ]);
    }

    public function detail($slug)
    {
        $truyen = Truyen::where('slug', $slug)->first();
        $arr_tap = Tap::where('id_truyen', $truyen->id)->get();
        $max_tap = max($arr_tap->pluck('id')->toArray());

        $arr_tacgia = [];
        $arr_tg = Truyen_tacgia::where('id_truyen', $truyen->id)->get();
        foreach ($arr_tg as $item) {
            $tg = [];
            $tg['id'] = $item->id_tacgia;
            $tg['tentacgia'] = Tacgia::findOrFail($item->id_tacgia)->tentacgia;
            array_push($arr_tacgia, $tg);
        }

        $arr_theloai = [];
        $arr_tl = Truyen_theloai::where('id_truyen', $truyen->id)->get();
        foreach ($arr_tl as $item) {
            $tl = [];
            $tl['id'] = $item->id_theloai;
            $tl['tentheloai'] = Theloai::findOrFail($item->id_theloai)->tentheloai;
            array_push($arr_theloai, $tl);
        }

        return response()->json([
            'truyen' => $truyen,
            'max_tap' => $max_tap,
            'arr_tap' => $arr_tap,
            'arr_tacgia' => $arr_tacgia,
            'arr_theloai' => $arr_theloai,
        ]);
    }

    public function reading($slug, $id)
    {
        $tap = Tap::findOrFail($id);
        $arr_path = [];
        foreach (json_decode($tap->path) as $item) {
            array_push($arr_path, $item);
        }
        $truyen = Truyen::where('slug', $slug)->first();
        $truyen->view = $truyen->view + 1;
        $truyen->save();

        $arr_tap = Tap::where('id_truyen', $truyen->id)->pluck('id')->toArray();
        $tap_trc = isset($arr_tap[array_search($tap->id, $arr_tap) - 1]) ? $arr_tap[array_search($tap->id, $arr_tap) - 1] : null;
        $tap_sau = isset($arr_tap[array_search($tap->id, $arr_tap) + 1]) ? $arr_tap[array_search($tap->id, $arr_tap) + 1] : null;

        return response()->json([
            'tentap' => $tap->tentap,
            'id_tap' => $tap->id,
            'tap_trc' => $tap_trc,
            'tap_sau' => $tap_sau,
            'truyen' => $truyen,
            'arr_path' => $arr_path,
        ]);
    }
}
