<?php

// Front routes 
$router->get('', 'HomeController@index');
$router->get('product/show', 'HomeController@show');

$router->get('carts', 'CartController@index');
$router->post('cart/store', 'CartController@store');
$router->post('cart/update', 'CartController@update');
$router->post('cart/delete', 'CartController@destroy');
$router->get('checkout', 'CheckoutController@index');
$router->post('order', 'CheckoutController@place');
$router->get('cancel', 'CheckoutController@cancel');
$router->get('returndata', 'CheckoutController@returndata');
$router->get('thankyou', 'CheckoutController@thankyou');
$router->get('invoice', 'CheckoutController@invoice');

// Dashboard routes 
$router->get('admin', 'DashboardController@index');

$router->get('categories', 'CategoryController@index');
$router->get('categories/create', 'CategoryController@create');
$router->post('categories', 'CategoryController@store');
$router->get('categories/edit', 'CategoryController@edit');
$router->post('categories/update', 'CategoryController@update');
$router->post('categories/delete', 'CategoryController@destroy');

$router->get('sub-categories', 'SubCategoryController@index');
$router->get('sub-categories/create', 'SubCategoryController@create');
$router->post('sub-categories', 'SubCategoryController@store');
$router->post('sub-categories/delete', 'SubCategoryController@destroy');

$router->get('products', 'ProductController@index');
$router->get('products/create', 'ProductController@create');
$router->post('products', 'ProductController@store');
$router->get('products/edit', 'ProductController@edit');
$router->post('products/update', 'ProductController@update');
$router->post('products/delete', 'ProductController@destroy');

// Not found route 
$router->get('404', 'DashboardController@notFound');
