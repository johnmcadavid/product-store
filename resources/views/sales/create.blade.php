@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nueva venta') }}</div>

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

                    <!-- Display Error Message -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Algunos datos no son válidos.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/sales/save') }}">
                        {{ csrf_field() }}
                        
                        <div class="mb-3">
                            <label class="form-label" for="inputName">Producto:</label>
                            <select class="form-select" name="product_id" id="product_id" aria-label="Default select example">
                                <option value="" selected>Seleccione un producto</option>
                                @foreach($products as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Cantidad:</label>
                            <input 
                                type="number" 
                                name="quantity" 
                                id="quantity"
                                class="form-control @error('quantity') is-invalid @enderror" 
                                value="{{ old('quantity', !empty($sale) ? $sale->quantity : '') }}"
                                placeholder="Digite la cantidad">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success btn-submit">Comprar</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
