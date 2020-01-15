<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Card;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('trans.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cards = Card::all();
        return view('trans.create',compact('cards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formWithdrawn = request('withdrawn');
        $description = request('description');
        $card_id = request('card_id');

        // get Card and it's Old Balance
        $card = Card::findOrFail($card_id);
        $balance = $card->balance;
        $newBalance = $balance - $formWithdrawn;
        
        //Gather Data for a Transaction
        $trans = new Transaction();
        $trans->trans_dateTime = date("Y-m-d H:i:s");
        $trans->withdrawn = $formWithdrawn;
        $trans->remaining_balance = $newBalance;
        $trans->card_id = $card_id;
        $trans->description = $description;

        if ($formWithdrawn <= $balance and $formWithdrawn > 0) 
        {
            //Create Transaction
            $trans->save();

            //Update Card Balance
            $card->balance = $newBalance;
            $card->save();
            return 1;
        } elseif ($formWithdrawn > $balance) {
            return 0;
        } else {
            return 'error';
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function getCardBalance(Card $card)
    {
        $card = Card::findOrFail(request('card_id'));
        $balance = $card->balance;
        return $balance;
    }
}
