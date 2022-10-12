@extends('layouts.app')
@php
    $color = $data['status'] == 'REJECTED' ? 'text-danger' : 'text-success';
@endphp
@section('content')
<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <div class="mt-3"></div>

        <form action="{{ route("order.store") }}" method="POST">
            <div class="card card-default">
                <div class="card-header">
                    Detalle de la compra
                    <div class="float-end">
                        Estado: <span class="{{$color}}">{{ __('app.' . $data['status']) }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row mb-2 mt-4">
                        <label class="form-label col-sm-6 col-form-label" for="product">Producto:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="product_text" name="product_text" value="{{ $data['product_text']}}">
                            <input type="hidden" name="product" value="{{ $data['product_id']}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label col-sm-6 col-form-label" for="price">Precio (COP) :</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="price" name="price" value="{{ $data['product_price']}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label col-sm-6 col-form-label" for="customer_name">Nombre del comprador:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="customer_name" name="customer_name" value="{{ $data['customer_name']}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label col-sm-6 col-form-label" for="customer_email">Correo electrónico del comprador:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="customer_email" name="customer_email" value="{{ $data['customer_email']}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label col-sm-6 col-form-label" for="customer_mobile">Número móvil del comprador:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="customer_mobile" name="customer_mobile" value="{{ $data['customer_mobile']}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row mb-3">
                        <div class="col-12 mt-3 text-end">
                            <cite>Creado: {{ $data['created_at'] }}</cite>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('js')
    {{-- <script src="{{ asset("js/order.js"); }}"></script> --}}
@endsection
