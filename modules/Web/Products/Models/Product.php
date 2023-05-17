<?php

namespace Web\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Web\Products\Database\Factories\ProductFactory;
use Web\User\Database\Factories\UserFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'count',
    ];

    /**
     * factory of user
     * @return ProductFactory
     */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    /**
     * decrement the product count
     * @return false|int
     */
    public function decrementCount(): bool|int
    {
        return $this->decrement('count');
    }
    /**
     * increment the product count
     * @return false|int
     */
    public function incrementCount(): bool|int
    {
        return $this->increment('count');
    }

}
