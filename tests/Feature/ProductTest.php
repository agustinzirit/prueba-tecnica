<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_listado_productos()
    {
        $response = $this->getJson('/product');

        $response->assertStatus(200);
    }

    public function test_producto_no_encontrado() {
        $response = $this->get('/product/100');

        $response->assertJsonMissingValidationErrors();
    }

    public function test_url_no_encontrada() {
        $response = $this->put('/product/100');

        $response->assertStatus(405);
    }
}
