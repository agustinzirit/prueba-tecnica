@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-md-4 offset-md-4">
        <div class="mt-3"></div>

        <h4>Registrar Compra</h4>

        <form action="{{ route("order.checkout") }}" method="POST">
            @csrf
            <div class="row mb-3 mt-4">
                <div class="col-12">
                    <label class="form-label" for="product">Producto</label>
                    <select name="product" id="product" class="form-control">
                        <option value="">Seleccione un producto</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label" for="customer_name">Nombre del comprador</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name">
                </div>
                <div class="col-12">
                    <label class="form-label" for="customer_email">Correo electrónico del comprador</label>
                    <input type="text" class="form-control" id="customer_email" name="customer_email">
                </div>
                <div class="col-12">
                    <label class="form-label" for="customer_mobile">Número móvil del comprador</label>
                    <input type="text" class="form-control" id="customer_mobile" name="customer_mobile">
                </div>
                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-primary" type="submit" id="btnPreOrderSave" data-route="{{ route('order.store') }}">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
</div>

@include('order/partials/_mldOrderDetails')

@endsection

@section('js')
    <script src="{{ asset("js/order.js"); }}"></script>
@endsection
