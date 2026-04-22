<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $route['default_controller'] = 'login';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

$routes->get('/', 'AuthController::login');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', function() {
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
    return view('dashboard');
});