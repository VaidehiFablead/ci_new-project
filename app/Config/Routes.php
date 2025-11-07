<?php

use App\Controllers\StdController;
use App\Controllers\StudentController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// $routes->get('hii','Hello::greet');

// $routes->get('welcome','Hello::index');




$routes->group('first', function ($routes) {
    $routes->get('index', 'Hello::index');
    $routes->get('greet', 'Hello::greet');
    $routes->get('bye', 'Hello::bye');
});

// $routes->get('form','Form::store');

// student Registration
$routes->get('register', 'StudentController::index');
$routes->post('store', 'StudentController::store');
// student login
$routes->get('/', 'StudentController::loginIndex');
$routes->post('/', 'StudentController::login');


// set middleware
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'StudentController::dashboard');
    $routes->get('logout', 'StudentController::logout');
    $routes->get('students', [StdController::class, 'index']);
    $routes->get('students/indexview', [StdController::class, 'index_view']);
    $routes->get('students/fetch', [StdController::class, 'fetchAll']);
    $routes->post('students/store', [StdController::class, 'store']);
    // $routes->delete('students/delete/(:num)', [StdController::class, 'delete/$1']);
    $routes->post('students/delete', [StdController::class, 'delete']);

});
