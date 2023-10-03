<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::get();

        return inertia('Supplier/index', [
            'suppliers' => Supplier::paginate(9)->through(function($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'address' => $client->address,
                    'phone' => $client->phone,

                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Supplier/create',[
            'suppliers' => Supplier::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required',
            'address' => 'required',
            'phone' => 'required|numeric'
        ]);


        Supplier::create($fields);

        return redirect('/suppliers')->with('message', 'Supplier Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return inertia('Supplier/show', [
            'supplier' => $supplier,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return inertia('Supplier/edit', [
            'suppliers' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $fields = $request->validate([
            'name'=>'required',
            'address' => 'required',
            'phone' => 'required|numeric',

        ]);



        $supplier->update($fields);

        return redirect('/suppliers')->with('message', 'Supplier has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
