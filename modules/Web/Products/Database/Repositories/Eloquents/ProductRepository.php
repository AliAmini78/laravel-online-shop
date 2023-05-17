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
            ->paginate(10);
    }


    /**
     * for store new product item
     * @param array $inputs
     * @return mixed
     */
    public function store(array $inputs): mixed
    {
        return $this->model
            ->newQuery()
            ->create($inputs);
    }

    /**
     * for update the product item
     * @param array $inputs
     * @param Product $product
     * @return mixed
     */
    public function update(array $inputs, Product $product): mixed
    {
        return $product->update($inputs);
    }

    /**
     * for destroy product item
     * @param Product $product
     * @return mixed
     */
    public function destroy(Product $product): mixed
    {
        return $product->delete();
    }
}
