<?php

namespace Web\Products\Database\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{

    /**
     * get all product with paginate
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator;
}
