@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo producto') }}</div>

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

                    <form method="POST" action="{{ url('/products/save') }}">
                        {{ csrf_field() }}
                        
                        @if (!empty($product->id))
                            <input type="hidden" name="id" id="id" value="{{ $product->id }}" />
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Nombre:</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', !empty($product) ? $product->name : '') }}"
                                placeholder="Digite el nombre del producto">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputReference">Referencia:</label>
                            <input 
                                type="text" 
                                name="reference" 
                                id="reference"
                                class="form-control @error('reference') is-invalid @enderror"
                                value="{{ old('reference', !empty($product) ? $product->reference : '') }}"
                                placeholder="Digite la referencia del producto">
                            @error('reference')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Precio:</label>
                            <input 
                                type="text" 
                                name="price" 
                                id="price"
                                class="form-control @error('price') is-invalid @enderror" 
                                value="{{ old('price', !empty($product) ? $product->price : '') }}"
                                placeholder="Digite el precio del producto">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Peso:</label>
                            <input 
                                type="text" 
                                name="weight" 
                                id="weight"
                                class="form-control @error('weight') is-invalid @enderror" 
                                value="{{ old('weight', !empty($product) ? $product->weight : '') }}"
                                placeholder="Digite el peso del producto">
                            @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Categoría:</label>
                            <input 
                                type="text" 
                                name="category" 
                                id="category"
                                class="form-control @error('category') is-invalid @enderror"
                                value="{{ old('category', !empty($product) ? $product->category : '') }}"
                                placeholder="Digite la categoría del producto">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Stock:</label>
                            <input 
                                type="text" 
                                name="stock" 
                                id="stock"
                                class="form-control @error('stock') is-invalid @enderror" 
                                value="{{ old('stock', !empty($product) ? $product->stock : '') }}"
                                placeholder="Digite el stock del producto">
                            @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success btn-submit">Guardar</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
