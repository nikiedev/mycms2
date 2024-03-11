<?php

namespace Modules\Shop\Models;

class Product
{
	public function getProductList()
	{
		return [
			[
				'model' => 'Model 1',
				'price' => 55.75
			],
			[
				'model' => 'Model 2',
				'price' => 155.25
			]
		];
	}
}