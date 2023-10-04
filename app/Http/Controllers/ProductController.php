<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Product/index', [
            'products' => Product::paginate(9)->through(function($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'qty' => $client->qty,
                    'price' => $client->price,

                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Product/create',[
            'products' => Product::orderBy('id','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required',
            'qty' => 'required',
            'price' => 'required|numeric'
        ]);


        Product::create($fields);

        return redirect('/products')->with('message', 'Products Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return inertia('Product/show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return inertia('Product/edit', [
            'products' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'name'=>'required',
            'qty' => 'required',
            'price' => 'required|numeric',

        ]);



        $product->update($fields);

        return redirect('/products')->with('message', 'Product has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back('/products');
    }
}
