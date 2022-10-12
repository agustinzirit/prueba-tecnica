<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
    * > This function returns all products from the database
    *
    * Returns:
    *   An array of all the products in the database.
    */
    public function index() {
        return ProductRepository::getAll();
    }

    /**
     * > This function returns a product by its id
     *
     * Args:
     *   id: The id of the product you want to retrieve.
     *
     * Returns:
     *   The product with the id of
     */
    public function show($id) {
        return ProductRepository::getById($id);
    }
}
