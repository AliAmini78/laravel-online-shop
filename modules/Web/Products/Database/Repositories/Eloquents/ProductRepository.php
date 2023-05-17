<?php

namespace Web\Products\Database\Repositories\Eloquents;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Web\Products\Database\Repositories\Contracts\ProductRepositoryInterface;
use Web\Products\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * get all product with paginate
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->latest()
            ->paginate(20);
    }
}
