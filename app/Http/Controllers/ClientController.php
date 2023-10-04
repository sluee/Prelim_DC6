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
    public function index() {
        $clients = Client::get();

        return inertia('Client/Index', [
            'clients' => Client::paginate(9)->through(function($client) {
                return [
                    'id' => $client->id,
                    'last_name' => $client->last_name,
                    'first_name' => $client->first_name,
                    'address' => $client->address,
                    'level' => $client->level,
                    'phone' => $client->phone,
                    'pic' => $client->pic ,
                ];
            })
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
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    public function show(Client $client)
    {

        return inertia('Client/Show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return inertia('Client/edit', [
            'clients' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
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


        $client->update($fields);

        return redirect('/clients')->with('message', 'Clients has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients')->with('message', 'Clients has been deleted successfully!');
    }
}
