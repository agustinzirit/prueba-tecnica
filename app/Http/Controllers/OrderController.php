<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Services\PlacetopayService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = OrderRepository::getAll();

        return view('order/list', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductRepository::getAll();

        return view('order/create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $orderId = OrderRepository::store($data);

        $response = PlacetopayService::createRequest($request, $orderId);

        if ($response->isSuccessful()) {

            $attributes = [
                'payment_id' => $response->requestId(),
                'payment_url' => $response->processUrl(),
                'updated_at' => Carbon::now()
            ];

            OrderRepository::update($orderId, $attributes);

            return redirect()->away($response->processUrl());
        } else {
            return back()->withErrors($response)->withInput();
        }
    }

    /**
     * It takes a request, gets the product from the database, and returns a view with the product name
     * and price
     *
     * Args:
     *   request (Request): The request object.
     *
     * Returns:
     *   A view with the data passed in.
     */
    public function checkout(Request $request) {
        $data = $request->all();

        $product = ProductRepository::getById($data['product']);

        $data['product_text'] = $product->name;
        $data['product_price'] = $product->price;

        return view("order/checkout", compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = (array) OrderRepository::findById($id);
        $product = ProductRepository::getById($order['product_id']);

        $order['product_text'] = $product->name;
        $order['product_price'] = $product->price;
        $placetopayId = $order['payment_id'];

        $response = PlacetopayService::getInformationByPlacetopayId($placetopayId);

        if ($response->isSuccessful()) {

            if ($response->status()->isApproved()) {
                $status = 'PAYED';
            } else {
                if ($response->status()->status() == 'REJECTED') {
                    $status = 'REJECTED';
                }
            }

            $order['status'] = $status;

            $attributes = [
                'status' => $status,
                'updated_at' => Carbon::now()
            ];

            OrderRepository::update($id, $attributes);
        }

        return view("order/show", ['data' => $order]);

    }
}
