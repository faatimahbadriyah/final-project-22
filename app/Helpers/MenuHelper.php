<?php

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            $route = explode('.',Route::currentRouteName())[0];
            if ($route == $u) {
                return $output;
            }
        }
    } else {
        $route= explode('.',Route::currentRouteName())[0];
        if ($route == $uri) {
            return $output;
        }
    }
}
