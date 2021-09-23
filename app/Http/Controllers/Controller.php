<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function activeMenu($menu, $submenu = "")
    {
        $listMenu = [
            'dashboard' => '',
            'table' => '',
            'cast' => '',
        ];
        if ($menu) {
            foreach ($listMenu as $key => $value) {
                if ($key == $menu) {
                    $listMenu[$key] = 'active';
                }
            }
        }

        $listSubmenu = [
            'table' => '',
            'datatable' => '',
        ];
        if ($submenu) {
            foreach ($listSubmenu as $key => $value) {
                if ($key == $submenu) {
                    $listSubmenu[$key] = 'active';
                }
            }
        }

        return ['menu' => $listMenu, 'submenu' => $listSubmenu];
    }
}