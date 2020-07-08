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

}
