<?php

namespace Modules\Shop\Controllers;

use App\Controllers\BaseController;
use Modules\Shop\Models\Product;

class ShopController extends BaseController
{
	public function productList()
	{
		$products = (new Product())->getProductList();
		
//		return view('App\Views\article', [
//			'products' => $products
//		]);
		return view('product_list', [
			'products' => $products
		]);
	}
}