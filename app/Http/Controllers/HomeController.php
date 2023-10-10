<?php

namespace App\Http\Controllers;

use App\Tap;
use App\Truyen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truyen_update = Truyen::orderByDesc('updated_at')->get();
        $truyen_new = Truyen::orderByDesc('created_at')->get();
        return view('pages.home.index', [
            'truyen_update' => $truyen_update,
            'truyen_new' => $truyen_new,
        ]);
    }

    public function showTruyen($slug)
    {
        $truyen = Truyen::where('slug', $slug)->first();
        if ($truyen) {
            return view('pages.truyen.show', [
                'truyen' => $truyen,
            ]);
        } else {
            abort(405, 'Không tìm thấy truyện');
        }
    }

    public function showTap($slug, $id){
        $tap = Tap::findOrFail($id);
        $truyen = Truyen::where('slug', $slug)->first();
        if($truyen && $tap){
            $truyen->view = $truyen->view + 1;
            $truyen->save();
            return view('pages.truyen.chapter', [
                'tap' => $tap,
                'truyen' => $truyen,
            ]);
        }else{
            abort(405, 'Không tìm thấy truyện');
        }
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
