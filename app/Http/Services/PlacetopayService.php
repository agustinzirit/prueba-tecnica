<?php
namespace App\Http\Services;

use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;

class PlacetopayService
{

    public static function createRequest(Request $request, $orderId) {
        $placetopay = new PlacetoPay([
            'login' => config('services.placetopay.login'), // Provided by PlacetoPay
            'tranKey' => config('services.placetopay.secret_key'), // Provided by PlacetoPay
            'baseUrl' => config('services.placetopay.url'),
            'rest' => [
                'timeout' => 45, // (optional) 15 by default
                'connect_timeout' => 30, // (optional) 5 by default
            ]
        ]);

        $payment = [
            'locale' => 'es_CO',
            'buyer' => [
                'name' => $request->customer_name,
                'email' => $request->customer_email,
                'mobile' => intval($request->customer_mobile)
            ],
            'payment' => [
                'reference' => $orderId,
                'description' => 'Nueva order para la referencia ' . $orderId,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $request->price,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('order.resume', ['id' => $orderId]), //'http://example.com/response?reference=' . $this->id,
            'ipAddress' => $request->ip(),
            'userAgent' => $request->server('HTTP_USER_AGENT'),
        ];

        return $placetopay->request($payment);
    }

    public static function getInformationByPlacetopayId($placetopayId) {
        $placetopay = new PlacetoPay([
            'login' => config('services.placetopay.login'), // Provided by PlacetoPay
            'tranKey' => config('services.placetopay.secret_key'), // Provided by PlacetoPay
            'baseUrl' => config('services.placetopay.url'),
            'rest' => [
                'timeout' => 45, // (optional) 15 by default
                'connect_timeout' => 30, // (optional) 5 by default
            ]
        ]);

        return $placetopay->query($placetopayId);
    }
}
