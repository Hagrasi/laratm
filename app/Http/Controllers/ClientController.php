<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        $validatedAttributes = request()->validate([
            'fullname' => ['required','min:6' , 'max:100'],
            'age' => ['required','max:2','numeric'] ,
            'email' => ['required','email']
        ]);

        Client::create($validatedAttributes);
       
        // instead of ... 
        // $client = new Client();
        // $client->fullname = request('fullname');
        // $client->age = request('age');
        // $client->email = request('email');
        // $client->save();

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show' , compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit' , compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client)
    {

        $validatedAttributes = request()->validate([
            'fullname' => ['required','min:6' , 'max:100'],
            'age' => ['required','max:2','numeric'] ,
            'email' => ['required','email']
        ]);

        $client->update($validatedAttributes);
        
        // instead of ...
        // $client->fullname = request('fullname');
        // $client->age = request('age');
        // $client->email = request('email');
        // $client->save();

        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }
}
