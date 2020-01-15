<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Client;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
        
    //     // echo "Hello America";
    //     // $data = request(session()->all());
    // }


    



    public function index()
    {
        $cards = Card::all();
        $clients = array();
        foreach($cards as $card){
            $clients[$card->id] = Client::findOrFail($card->client_id);
        }
        
        // session(['Key' => 'value']);
        return view('cards.index',compact('cards'),compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $request = request('client_id');
        if($request){
            $clients = Client::findOrFail($request);
        }else{
            $clients = Client::all();
        }
        // return $clients;
        
        return view('cards.create' , compact('clients'),compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = request()->validate([
            'card_number' => ['required','numeric'],
            'pin_code' => ['required','numeric'] ,
            'balance' => ['required','numeric'],
            'client_id' => ['required']
        ]);

        Card::create($validatedAttributes);

        return redirect('/cards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {

        $client = Client::findOrFail($card->client_id);
        
        return view('cards.show' , compact('card') , compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        // $card_id = request()->segment(2);
        $cardForClient = Card::findOrFail($card->id);
        $client = Client::findOrFail($cardForClient->client_id);
        // return $client;
        return view('cards.edit' , compact('card','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        // Form Validation
        $validatedAttributes = request()->validate([
            'old_pin_code' => ['required','numeric','digits_between:1,4'],
            'pin_code' => ['required','numeric','digits:4'] ,
            'card_number' => ['required','numeric','digits:8'],
            'balance' => ['required','numeric','digits_between:2,7']
        ]);

        // Attributes to be saved
        $attributes = [
            'card_number'=> $validatedAttributes['card_number'],
            'pin_code'=> $validatedAttributes['pin_code'],
            'balance'=> $validatedAttributes['balance']
                    ];

        // Logic of Update
        $old_pin_code = request('old_pin_code');
        $new_pin_code = request('pin_code');
        $db_old_pin_code = $card->pin_code;
        if($old_pin_code == $db_old_pin_code){
            //update
            $card->update($attributes);
            return redirect('/cards');
        } else{
            // $client = Client::findOrFail($card->client_id); 
            $validatedAttributes = request()->validate([ 'pin_code' => ['confirmed']]);
            $client = Client::findOrFail($card->client_id);
            return view('cards.edit' , compact('card','client'));
            //echo $errors['PinCodeError'] = "Old Pin Code is not Correct .. Go back ";
            // return view('cards.edit' , compact('errors','card','client'));
        }
        
        
        
        
        
        // return $card;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect('/cards');
    }
}
