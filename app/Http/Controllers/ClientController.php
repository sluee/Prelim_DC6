<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return inertia('Client/Index', [
    //         'clients' => Client::orderBy('first_name', 'asc')->get(),
    //     ]);
    // }

    public function index() {
        $clients = Client::get();

        return inertia('Client/Index', [
            'clients' => Client::paginate(10)->through(fn($client) =>[
                'id' => $client->id,
                'last_name' =>$client->last_name,
                'first_name' =>$client->first_name,
                'address' =>$client->address,
                'level' =>$client->level
            ])
        ]);
    }

    public function search($searchKey){
        return inertia('Client/Index', [
            'clients' => Client::where('first_name', 'like' , "%$searchKey%")->orWhere('last_name', 'like' , "%$searchKey%")->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Client/Create',[
            'clients' => Client::orderBy('first_name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'first_name'=>'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'level' => 'required|numeric',
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/client_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Client::create($fields);

        return redirect('/clients')->with('message', 'Client Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
