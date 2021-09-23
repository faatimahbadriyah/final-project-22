<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
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

    public function table()
    {
        $activeMenu = $this->activeMenu('table', 'table');
        $data = [
            'title' => 'TABLE',
            'parent' => 'Home',
            'child' => 'table',
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('table', $data);
    }

    public function dataTable()
    {
        $activeMenu = $this->activeMenu('table', 'datatable');
        $data = [
            'title' => 'DATATABLE',
            'parent' => 'Home',
            'child' => 'datatable',
            'menu' => $activeMenu['menu'],
            'submenu' => $activeMenu['submenu'],
        ];
        return view('datatable', $data);
    }
}