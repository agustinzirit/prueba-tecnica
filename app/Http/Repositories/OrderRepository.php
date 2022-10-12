<?php

namespace App\Http\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    /**
     * It returns all the orders from the database, along with the product name and price
     *
     * Returns:
     *   An array of objects
     */
    public static function getAll() {
        return DB::table('orders AS o')
        ->join('product AS p', "p.id", "=", "o.product_id")
        ->select(['o.*', 'p.name as product_name', 'p.price'])
        ->get();
    }

    /**
     * It takes an array of data, and inserts it into the database, returning the ID of the newly
     * created row
     *
     * Args:
     *   data: This is the data that we are going to store in the database.
     *
     * Returns:
     *   The ID of the newly created order.
     */
    public static function store($data) {
        return DB::table('orders')->insertGetId([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_mobile' => $data['customer_mobile'],
            'product_id' => $data['product'],
            'status' => 'CREATED',
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * It updates the order with the given id.
     *
     * Args:
     *   id: The id of the order you want to update.
     *   data: The data to be updated.
     *
     * Returns:
     *   The number of affected rows.
     */
    public static function update($id, $data) {
        return DB::table('orders')->where("id", $id)->update($data);
    }

    /**
     * > Find an order by its id
     *
     * Args:
     *   id: The id of the order you want to find.
     *
     * Returns:
     *   An object of the order with the id of
     */
    public static function findById ($id) {
        return DB::table('orders')->find($id);
    }
}
