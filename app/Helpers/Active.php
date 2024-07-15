<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
  function set_active($routes, $class = 'active')
  {
    return in_array(Route::currentRouteName(), $routes) ? $class : '';
  }
}

if (!function_exists('set_show')) {
  function set_show($routes, $class = 'show')
  {
    return in_array(Route::currentRouteName(), $routes) ? $class : '';
  }
}
