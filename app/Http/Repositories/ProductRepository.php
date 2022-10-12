<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * It returns all the rows from the product table
     *
     * Returns:
     *   All the rows in the product table.
     */
    public static function getAll() {
        return DB::table('product')->get();
    }

    /**
     * > This function returns a product from the database with the given id
     *
     * Args:
     *   productId: The id of the product you want to get.
     *
     * Returns:
     *   The product with the id of
     */
    public static function getById($productId) {
        return DB::table('product')->find($productId);
    }
}
