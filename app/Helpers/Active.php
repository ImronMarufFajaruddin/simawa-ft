<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
  function set_active($routes, $class = 'active')
  {
    // Cek apakah nama rute saat ini ada dalam $routes
    // atau apakah URI saat ini mengandung 'show' atau 'detail' tanpa ID
    return in_array(Route::currentRouteName(), $routes) ||
      (str_contains(Route::current()->uri, 'show') && !request()->route('id')) ||
      (str_contains(Route::current()->uri, 'detail') && !request()->route('id')) ? $class : '';
  }
}

if (!function_exists('set_show')) {
  function set_show($routes, $class = 'show')
  {
    // Cek apakah nama rute saat ini ada dalam $routes
    // atau apakah URI saat ini mengandung 'show' atau 'detail' tanpa ID
    return in_array(Route::currentRouteName(), $routes) ||
      (str_contains(Route::current()->uri, 'show') && !request()->route('id')) ||
      (str_contains(Route::current()->uri, 'detail') && !request()->route('id')) ? $class : '';
  }
}
