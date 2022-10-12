<?php

namespace Tests\Feature;

use App\Http\Repositories\ProductRepository;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_crear_orden_compra()
    {
        $response = $this->get("/order/create");

        $response->assertStatus(200)->assertSee('Registrar Compra');
    }

    public function test_checkout() {
        $productList = ProductRepository::getAll();
        $obtenerProduct = rand(1, count($productList));

        $product = $productList[$obtenerProduct];

        $data = [
            '_token' => csrf_token(),
            "product" => $product->id,
            "customer_name" => fake()->name(),
            "customer_email" => fake()->email(),
            "customer_mobile" => fake()->phoneNumber(),
        ];

        $response = $this->json('POST', '/order/checkout', $data);

        $response->assertStatus(200);
    }

    public function test_mostrar_resumen_compra () {

    }
}
