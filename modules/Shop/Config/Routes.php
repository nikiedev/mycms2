<?php

if(!isset($routes))
{
	$routes = \Config\Services::routes();
}

//$routes->group('shop', [
//	'namespace' => 'Modules\Shop\Controllers'
//], function($routes) {
//
//	$routes->get('product', 'ShopController::productList');
//});

$routes->get('article', 'ShopController::productList', [
	'namespace' => 'Modules\Shop\Controllers'
]);