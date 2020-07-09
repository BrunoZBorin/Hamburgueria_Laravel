<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Client;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $request->session()
            ->flash(
                'message',
                "Produto {$product->name} cadastrado com sucesso"
            );
       
        return redirect ('/products');
        
    }

    function edit(int $id)
    {
        $product = Product::find($id);
        return view('products.update', compact('product'));
    }

    function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->value = $request->value;
        $product->save();
        return redirect ('/products');
    }

    function destroy(Request $request)
    {
        Product::destroy($request->id);
        return redirect ('/products');
    }


}
