<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Lichsu;
use App\Like;
use App\Report;
use App\Tap;
use App\Theodoi;
use App\Truyen;
use App\Truyen_tacgia;
use App\Truyen_theloai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function post_dislike($id_user, $id_truyen){
        $c = Dislike::where('id_user', $id_user)->where('id_truyen', $id_truyen)->first();
        if($c){
            $c->delete();
            $count = count(Dislike::where('id_truyen', $id_truyen)->get());
            $status = 'delete';
        }else{
            $dislike = new Dislike();
            $dislike->id_user = $id_user;
            $dislike->id_truyen = $id_truyen;
            $dislike->save();
            $count = count(Dislike::where('id_truyen', $id_truyen)->get());
            $status = 'insert';
        }
        return response()->json(['status' => $status, 'count' => $count]);
    }
    
    public function post_like($id_user, $id_truyen){
        $c = Like::where('id_user', $id_user)->where('id_truyen', $id_truyen)->first();
        if($c){
            $c->delete();
            $count = count(Like::where('id_truyen', $id_truyen)->get());
            $status = 'delete';
        }else{
            $like = new Like();
            $like->id_user = $id_user;
            $like->id_truyen = $id_truyen;
            $like->save();
            $count = count(Like::where('id_truyen', $id_truyen)->get());
            $status = 'insert';
        }
        return response()->json(['status' => $status, 'count' => $count]);
    }

    public function post_theodoi($id_user, $id_truyen){
        $c = Theodoi::where('id_user', $id_user)->where('id_truyen', $id_truyen)->first();
        if($c){
            $c->delete();
            $count = count(Theodoi::where('id_truyen', $id_truyen)->get());
            $status = 'delete';
        }else{
            $t = new Theodoi();
            $t->id_user = $id_user;
            $t->id_truyen = $id_truyen;
            $t->save();
            $count = count(Theodoi::where('id_truyen', $id_truyen)->get());
            $status = 'insert';
        }
        return response()->json(['status' => $status, 'count' => $count]);
    }

    public function error_report(Request $request){
        $data = new Report();
        $data->url = $request->chapter_err;
        $data->des = $request->description;
        $data->save();
    }

    public function history()
    {
        $lichsu = Lichsu::where('id_user', Session::get('loginId'))->get();
        return view('pages.history.history', ['lichsu' => $lichsu]);
    }

    public function search(Request $request)
    {
        $key = $request->q;
        $truyen = Truyen::where('tentruyen', 'like', '%' . $key . '%')->Orwhere('tenkhac', 'like', '%' . $key . '%')->get();
        return response()->json($truyen);
    }
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
                ->orderBy('latest_tap_updated_at')
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
            $loginId = Session::get('loginId');
            $truyen_same_tacgia = Truyen_tacgia::where('id_truyen', $truyen->id)->pluck('id_truyen')->toArray();

            return view('pages.truyen.show', [
                'loginId' => $loginId,
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
            if (Session::has('loginId')) {
                $check = Lichsu::where('id_user', Session::get('loginId'))->where('id_truyen', $truyen->id)->first();
                if ($check == null) {
                    $lichsu = new Lichsu();
                    $lichsu->id_user = Session::get('loginId');
                    $lichsu->id_tap = $id;
                    $lichsu->id_truyen = $truyen->id;
                    $lichsu->save();
                }else{
                    $lichsu = Lichsu::findOrFail($check->id);
                    $lichsu->id_tap = $id;
                    $lichsu->save();
                }
            }

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

    public function get_theloai(Request $request, $id)
    {
        if ($request->sort) {
            $sort = $request->sort;
            if ($sort == 'update') {
                // $arr_truyen = Truyen::select('truyen.*')
                //     ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                //     ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                //     ->orderByDesc('latest_tap_updated_at')
                //     ->distinct()
                //     ->paginate(24);

                $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
                $arr_truyen = [];
                foreach ($arr as $item) {
                    $find = Truyen::findOrFail($item);
                    array_push($arr_truyen, $find);
                }

                // Sắp xếp mảng theo thời gian cập nhật tập truyện giảm dần
                usort($arr_truyen, function ($a, $b) {
                    $latestTapA = $a->tap()->max('updated_at');
                    $latestTapB = $b->tap()->max('updated_at');
                    return strtotime($latestTapB) - strtotime($latestTapA);
                });
            } else if ($sort == 'za') {
                $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
                $arr_truyen = [];
                foreach ($arr as $item) {
                    $find = Truyen::findOrFail($item);
                    array_push($arr_truyen, $find);
                }

                // Sắp xếp mảng theo trường 'tentruyen' từ Z đến A
                usort($arr_truyen, function ($a, $b) {
                    return -strcmp($a->tentruyen, $b->tentruyen);
                });
            } else if ($sort == 'az') {
                $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
                $arr_truyen = [];
                foreach ($arr as $item) {
                    $find = Truyen::findOrFail($item);
                    array_push($arr_truyen, $find);
                }

                // Sắp xếp mảng theo trường 'tentruyen' từ A đến Z
                usort($arr_truyen, function ($a, $b) {
                    return strcmp($a->tentruyen, $b->tentruyen);
                });
            } else if ($sort == 'new') {
                $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
                $arr_truyen = [];
                foreach ($arr as $item) {
                    $find = Truyen::findOrFail($item);
                    array_push($arr_truyen, $find);
                }

                usort($arr_truyen, function ($a, $b) {
                    $latestA = $a->tap()->max('created_at');
                    $latestB = $b->tap()->max('created_at');
                    return -strtotime($latestB) - strtotime($latestA);
                });
            } else if ($sort == 'top') {
                $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
                $arr_truyen = [];
                foreach ($arr as $item) {
                    $find = Truyen::findOrFail($item);
                    array_push($arr_truyen, $find);
                }

                usort($arr_truyen, function ($a, $b) {
                    return $b->view - $a->view;
                });
            }
        } else if ($request->hoanthanh) {
            $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
            $arr_truyen = [];
            foreach ($arr as $item) {
                $find = Truyen::findOrFail($item);
                if ($find->status == 1) {
                    array_push($arr_truyen, $find);
                }
            }
        } else if ($request->dangtienhanh) {
            $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
            $arr_truyen = [];
            foreach ($arr as $item) {
                $find = Truyen::findOrFail($item);
                if ($find->status == 0) {
                    array_push($arr_truyen, $find);
                }
            }
        } else {
            $arr = Truyen_theloai::where('id_theloai', $id)->pluck('id_truyen')->toArray();
            $arr_truyen = [];
            foreach ($arr as $item) {
                $find = Truyen::findOrFail($item);
                array_push($arr_truyen, $find);
            }
        }

        $truyenCollection = collect($arr_truyen);

        // Số trang hiển thị trên mỗi trang
        $perPage = 1;
        // Trang hiện tại (lấy từ query parameter hoặc giá trị mặc định)
        $page = request()->get('page', 1);
        // Tạo một LengthAwarePaginator từ Collection
        $truyen = new LengthAwarePaginator(
            $truyenCollection->forPage($page, $perPage), // Dữ liệu trên trang hiện tại
            $truyenCollection->count(), // Tổng số items
            $perPage, // Số lượng items trên mỗi trang
            $page, // Trang hiện tại
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Cấu hình cho URL pagination
        );

        // dd($truyen);
        return view('pages.danhsach.index', [
            'truyen' => $truyen,
        ]);
    }

    public function get_danhsach(Request $request)
    {
        if ($request->sort) {
            $sort = $request->sort;
            if ($sort == 'update') {
                $truyen = Truyen::select('truyen.*')
                    ->join('tap', 'truyen.id', '=', 'tap.id_truyen')
                    ->select('truyen.*', DB::raw('(SELECT MAX(updated_at) FROM tap WHERE tap.id_truyen = truyen.id) as latest_tap_updated_at'))
                    ->orderByDesc('latest_tap_updated_at')
                    ->distinct()
                    ->paginate(1);
            } else if ($sort == 'za') {
                $truyen = Truyen::orderByDesc('tentruyen')->paginate(1);
            } else if ($sort == 'az') {
                $truyen = Truyen::orderBy('tentruyen')->paginate(1);
            } else if ($sort == 'new') {
                $truyen = Truyen::orderByDesc('created_at')->paginate(1);
            } else if ($sort == 'top') {
                $truyen = Truyen::orderByDesc('view')->paginate(1);
            }
        } else if ($request->hoanthanh) {
            $truyen = Truyen::where('status', 1)->paginate(1);
        } else if ($request->dangtienhanh) {
            $truyen = Truyen::where('status', 0)->paginate(1);
        } else {
            $truyen = Truyen::paginate(1);
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
