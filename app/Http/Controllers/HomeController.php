<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {

        $activeMenu = $this->activeMenu('dashboard', '');
        $data = [
            'title' => 'DASHBOARD',
            'parent' => 'Home',
            'child' => 'dashboard',
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('index', $data);
    }
}