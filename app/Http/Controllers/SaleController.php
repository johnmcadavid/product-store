<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
 
    /**
     * Constructor. Se valida usuario autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna el listado de ventas guardadas
     */
    public function index(Request $request)
    {
        $sales = Sale::latest()->get();
        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Carga datos para la vista del formulario de creación
     */
    public function create()
    {
        $products = Product::pluck('name', 'id');
        return view('sales.create', [ 
            'products' => $products
        ]);
    }
    
    /**
     * Almacena los datos de una nueva venta
     */
    public function save(Request $request)
    {
        $validatedData = $this->validateData($request);
        try {
            $sale = Sale::Create(
                [
                    'product_id' => $request->input("product_id"),
                    'quantity' => $request->input("quantity"),
                ]
            );
            $product = Product::where('id', $request->input("product_id"))->first();
            $product->stock  = $product->stock - $request->input("quantity");
            $product->save(); 
            Log::channel('sales')->info('sales.save', $sale->toArray());
            session(['success' => 'Venta creada correctamente']);
            return redirect()->route('sales.index');
        } catch (Exception $e) {
            Log::channel('sales')->info('sale.save', ['id' => $request->input("product_id"), 'message' => $e->getMessage()]);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Valida los datos enviados desde el formulario de creación
     */
    public function validateData(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ], [
            'product_id.required' => 'El campo Producto es requerido.',
            'product_id.integer' => 'El campo Producto debe ser numérico.',
            'product_id.required' => 'El campo Cantidad es requerido.',
            'product_id.integer' => 'El campo Cantidad debe ser numérico.',
        ]);
        return $validatedData;
    }

}
