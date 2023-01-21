<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
 
    /**
     * Constructor. Se valida usuario autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna el listado de productos guardados
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Retorna los datos del producto consultado por ID    
     */
    public function detail(Int $id)
    {
        try {
            $product = Product::where('id', $id)->first();
        } catch (Exception $e) {
            Log::channel('products')->info('product.detail', ['id' => $id, 'message' => $e->getMessage()]);
            return back()->with('error', $e->getMessage());
        }
        return view('products.detail', ['product' => $product]);
    }

    /**
     * Carga datos para la vista del formulario de creación
     */
    public function create(Int $productId=-1)
    {
        if ($productId == -1) {
            $product = null;
        }
        else
        {
            $product = Product::where('id', $productId)->first();
        }
        return view('products.create', [ 
            'product' => $product
        ]);
    }    

    /**
     * Crea un nuevo producto o lo actualiza si ya existe consultando por id.
     */
    public function save(Request $request)
    {
        $validatedData = $this->validateData($request);

        try {
            $product = Product::updateOrCreate([
                'id' => $request->input("id")
            ], 
            [
                'name' => $request->input("name"),
                'reference' => $request->input("reference"),
                'price' => $request->input("price"),
                'weight' => $request->input("weight"),
                'category' => $request->input("category"),
                'stock' => $request->input("stock")
            ]);
            Log::channel('products')->info('product.save', $product->toArray()); 
            session(['success' => 'Producto creado correctamente']);
            return redirect()->route('products.index');
        } catch (Exception $e) {
            Log::channel('products')->info('product.save', ['name' => $request->input("name"), 'message' => $e->getMessage()]);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Valida los datos enviados desde el formulario de creación
     */
    public function validateData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'reference' => 'required|string',
            'price' => 'integer',
            'weight' => 'integer',
            'category' => 'required|string',
            'stock' => 'required|integer',
        ], [
            'name.required' => 'El campo Nombre es requerido.',
            'name.string' => 'El nombre ingresado no es válido.',
            'reference.required' => 'El campo Referencia es requerido.',
            'reference.unique' => 'El campo Referencia debe ser único.',
            'reference.string' => 'La referencia ingresada no es válida.',
            'price.integer' => 'El precio ingresado no es válido.',
            'weight.integer' => 'El peso ingresado no es válido.',
            'category.required' => 'El campo Categoría es requerido.',
            'category.string' => 'La categoría ingresada no es válida.',
            'stock.required' => 'El campo Stock es requerido.',
            'stock.integer' => 'El stock ingresado no es válido.',
        ]);
        return $validatedData;
    }
    
}
