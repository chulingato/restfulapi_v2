<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    
        return Product::all();
        
        /*$product = Product::all();
        foreach ($product as $products) {
                return response()->json([
                'Producto' => [
                    'nombre'=>$products->name,
                    'stock'=>$products->id 
                ]
            ], 201);
        }*/

    }

    public function create(Request $request)
    {
          if ($request->input('type')==='crear') {
       return $this->createProduct(
        $request->input('nombre'),
        $request->input('stock')
       );
        }

    }//end functino create

    private function createProduct($name, $stock)
{
    $product = Product::firstOrCreate(
    ['name' => $name],
    ['stock' => $stock]
);

    return response()->json([
                'producto' => [
                    'name'=>$product->name,
                    'stock'=>$product->stock
                ]
            ], 201);

}
}
