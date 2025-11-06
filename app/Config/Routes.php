<?php

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

});
