<?php

namespace App\Http\Controllers;
use App\Lapangan;
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
        $lapangan = Lapangan::with(['jadwal' => function ($q) {
            $q->where('status', 'avaliable');
        }])->get();
        return view('index', compact('lapangan'));
    }
}