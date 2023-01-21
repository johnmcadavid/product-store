@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de ventas realizadas') }}</div>

                <div class="card-body p-2">

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert alert-danger alert-block">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                    @endif
                    
                </div>

                <div class="container col-md-offset-2">
                    <div class="panel panel-default">
                        @if ($sales->isEmpty())
                            <div>No se encontraron ventas registradas</div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Inventario</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>{!! $sale->id !!}</td>
                                            <td>{!! $sale->created_at !!}</td>
                                            <td>{!! $sale->product->name !!}</td>
                                            <td>{!! $sale->product->stock !!}</td>
                                            <td>{!! $sale->quantity !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
