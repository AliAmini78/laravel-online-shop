<?php

namespace Web\Products\Database\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Web\Products\Models\Product;

interface ProductRepositoryInterface
{

    /**
     * get all product with paginate
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator;

    /**
     * for store new product item
     * @param array $inputs
     * @return mixed
     */
    public function store(array $inputs): mixed;


    /**
     * for update the product item
     * @param array $inputs
     * @param Product $product
     * @return mixed
     */
    public function update(array $inputs ,Product $product): mixed;

    /**
     * for destroy product item
     * @param Product $product
     * @return mixed
     */
    public function destroy(Product $product): mixed;
}
