<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\LoginRegister; // Capital 'A'
use app\Controllers\Admin;
use app\Controllers\Guest;
/**
 * @var RouteCollection $routes
 */



//Made A group so that it will be organized
$routes -> group('auth', ['filter' =>'guest', 'nocache'], static function($routes){
    // URL: /auth/guest-home
  $routes->get('dahsboard', [Guest::class, 'guest-home']);
});


$routes->post('login_process', 'LoginRegister::login_process_test2', ['as' => 'll']);
$routes->get('login', 'LoginRegister::login');
$routes->post('login2', 'LoginRegister::login2');
$routes->get('register', [LoginRegister::class, 'register']);


//yoursite.com/admin/users
//"Everything inside these brackets belongs to the 'admin' URL, and nobody gets in unless they pass the 'auth' check."
$routes ->group('admin', ['filter' =>'authorized', 'nocache'], static function($routes){
    // Automatic URL: admin/dashboard
    // Automatic Security: Checks 'auth'
    $routes->get('dashboard', [Admin::class, 'index']); 

    // Automatic URL: admin/users
    // Automatic Security: Checks 'auth'
    $routes->get('users', [Admin::class, 'users']);

    // Automatic URL: admin/settings
    // Automatic Security: Checks 'auth'
    $routes->get('settings', [Admin::class, 'settings']);
});
