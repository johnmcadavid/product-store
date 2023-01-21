@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalle del producto') }}</div>

                <div class="card-body p-2">

                    <div class="row">
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Id</p>
                            <p>{{ $product->id }}</p>
                        </div>
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Referencia</p>
                            <p>{{ $product->reference }}</p>
                        </div>
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Precio</p>
                            <p>{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Peso</p>
                            <p>{{ $product->weight }}</p>
                        </div>
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Categoría</p>
                            <p>{{ $product->category }}</p>
                        </div>
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Stock</p>
                            <p>{{ $product->stock }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <p class="small text-muted mb-1">Fecha de creación</p>
                            <p>{{ $product->created_at }}</p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
