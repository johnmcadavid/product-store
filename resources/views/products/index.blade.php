@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de productos') }}</div>

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
                        @if ($products->isEmpty())
                            <div>No se encontraron productos registrados</div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Precio</th>
                                        <th>Peso</th>
                                        <th>Categoría</th>
                                        <th>Stock</th>
                                        <th>Fehca</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{!! $product->id !!}</td>
                                            <td>{!! $product->name !!}</td>
                                            <td>{!! $product->reference !!}</td>
                                            <td>{!! $product->price !!}</td>
                                            <td>{!! $product->weight !!}</td>
                                            <td>{!! $product->category !!}</td>
                                            <td>{!! $product->stock !!}</td>
                                            <td>{!! $product->created_at !!}</td>
                                            <td><a href="/products/edit/{{$product->id}}">Editar</a></td>
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
