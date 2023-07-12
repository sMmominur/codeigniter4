<?php

namespace Config;

use App\Controllers\ExamCategoryController;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

#$routes->get('test', 'MyController::learnRoute');
#$routes->get('test', 'MyController');

$routes->get('test', [\App\Controllers\MyController::class, 'index']);

#$routes->get('users', 'Admin\LearnController::index');
$routes->get('users', 'LearnController::index',['namespace' => 'App\Controllers\Admin']);
#$routes->get('users/profile', 'Users::profile', ['as' => 'profile']);
#$routes->get('admin', ' AdminController::index', ['filter' => 'admin-auth']);
#$routes->get('admin', ' AdminController::index', ['filter' => \App\Filters\SomeFilter::class]);
#$routes->get('admin', ' AdminController::index', ['filter' => ['admin-auth', \App\Filters\SomeFilter::class]]);
#$routes->get('from', 'to', ['hostname' => 'accounts.example.com']);
// Limit to media.example.com
#$routes->get('from', 'to', ['subdomain' => 'media']);
// Limit to any sub-domain
#$routes->get('from', 'to', ['subdomain' => '*']);
#$routes->get('users/(:num)', 'users/show/$1', ['offset' => 1]);

$routes->get('exam-category', 'ExamCategoryController::index');
$routes->get('exam-category/create', 'ExamCategoryController::create');
$routes->post('exam-category/store', 'ExamCategoryController::store');
$routes->get('exam-category/edit/(:num)', 'ExamCategoryController::edit/$1');
$routes->post('exam-category/update/(:num)', 'ExamCategoryController::update/$1');
$routes->get('exam-category/delete/(:num)', 'ExamCategoryController::delete/$1');

/**
 * Service Example routes
 */
$routes->get('my-service', 'MyController::index');
$routes->get('my-calculator', 'MyController::calculate');


/**
 * Cache routes
 */
$routes->get('my-cache', 'MyController::testCache');

/**
 * Trait test routes
 */

 $routes->get('my-trait', 'MyController::testTrait');


 $routes->get('testit','MyController::testAny');

 /**
  * Helper function routes
  */

  #$routes->get('my-helper', 'MyController::testHelper');

  #$routes->get('product/(:num)/(:num)', [Product::class, 'index']);

  // The above code is the same as the following:
  #$routes->get('product/(:num)/(:num)', 'Product::index/$1/$2');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
