<?php

namespace Web\Products\Database\Repositories\Eloquents;

use Web\Products\Database\Repositories\Contracts\ProductRepositoryInterface;
use Web\Products\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
