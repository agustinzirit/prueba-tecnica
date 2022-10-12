@extends('layouts.app')

@section('content')
    <div class="mt-3"></div>
    <h4>Listado de Ordenes de Pagos</h4>

    <div class="row mb-3 mt-4">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Número móvil</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        {{-- <th>Acción</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordenes as $orden)
                        <tr>
                            <td>{{ $orden->customer_name }}</td>
                            <td>{{ $orden->customer_email }}</td>
                            <td>{{ $orden->customer_mobile }}</td>
                            <td>{{ $orden->product_name }}</td>
                            <td>{{ $orden->price }}</td>
                            <td>{{ __('app.' . $orden->status) }}</td>
                            <td>{{ $orden->created_at }}</td>
                            {{-- <td> --}}
                                {{-- @if ($orden->status == 'CREAYED') --}}
                                {{-- <a class="btn btn-sm btn-primary" href="{{ $orden->payment_url}}">Pagar</a> --}}
                                {{-- @endif --}}
                            {{-- </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay ordenes registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
