<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeMenu = $this->activeMenu('cast');
        $casts = Cast::all();
        $data = [
            'title' => 'CAST LIST',
            'parent' => 'Home',
            'child' => 'cast',
            'casts' => $casts,
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('cast.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activeMenu = $this->activeMenu('cast');
        $data = [
            'title' => 'CAST CREATE',
            'parent' => 'Home',
            'child' => 'cast',
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('cast.create', $data);
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
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);
        $query = Cast::create([
            "nama" => $request["nama"],
            "umur" => $request["umur"],
            "bio" => $request["bio"],
        ]);
        return redirect('/cast');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activeMenu = $this->activeMenu('cast');
        $cast = Cast::where('id', $id)->first();
        $data = [
            'title' => 'CAST SHOW',
            'parent' => 'Home',
            'child' => 'cast',
            'cast' => $cast,
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('cast.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activeMenu = $this->activeMenu('cast');
        $cast = Cast::where('id', $id)->first();
        $data = [
            'title' => 'CAST EDIT',
            'parent' => 'Home',
            'child' => 'cast',
            'cast' => $cast,
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('cast.edit', $data);
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
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);
        $cast = Cast::where('id', $id)->first();
        $cast->nama = $request["nama"];
        $cast->umur = $request["umur"];
        $cast->bio = $request["bio"];
        $cast->update();

        return redirect('/cast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Cast::where('id', $id)->delete();
        return redirect('cast');
    }
}