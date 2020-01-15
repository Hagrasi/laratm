<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Card;
use App\Models\Transaction;

class MainController extends Controller
{

    public function __construct()
    {
        
    }


    public function index(){
        //
    }
    public function loginView(){

        if(session()->has('card')){
            return redirect('/home');
        } else {
            return view('login');
        }
        
    }

    public function login(Request $request)
    {   
        
        // Attributes Validation
        $validatedAttributes = request()->validate([
            'cardNumber' => ['required','numeric','digits:8'],
            'pinCode' => ['required','numeric','digits:4']
        ]);
        
        // Data Gathering
        $card_number = $request->cardNumber;
        $pin_code = $request->pinCode;
        $card = Card::where('card_number', $card_number)->first();
        $client_id = $card['client_id'];
        $client = Client::findOrFail($client_id);
        
        
        
        //Login Logic
        if($card_number == $card['card_number'])
        {
            if($pin_code == $card->pin_code)
            {
                session()->put('card' , $card);
                return redirect('/home');
                // return view('home' , compact('card','client'));
            } 
            else 
            {
                $validatedCardNu = request()->validate([
                    'pinCode' => ['confirmed']
                ]);
                return view('login');
                // echo "Pin Code is Not Correct ...";
            }
        }
        else 
        {
            $validatedCardNu = request()->validate([
                'cardNumber' => ['confirmed']
            ]);
            return view('login');
            // echo "Card Number is Not Correct ...";
        }


        // $member = new Card();
        // $member->card_number = $request->cardNumber;
        // $member->pin_code = $request->pinCode;
        // return $member;
        // return response()->json($member);
    }

    public function homeView(Card $card , Client $client)
    {
        if(session()->has('card')){
            $card = session()->get('card');
            $client = Client::findOrFail($card->client_id);
            session()->put('client' , $client);
            
            return view('home' , compact('card','client'));
        } else {
            return redirect('/login');
        }


        
    }

    public function withdrawView()
    {
        if(session()->has('card')){
            $sessCard = session()->get('card');
            $client = Client::findOrFail($sessCard->client_id);
            $dbCard = Card::findOrFail($sessCard->id);
            

            return view('withdraw',compact('dbCard'));
        } else {
            return redirect('/login');
        }

    }

    public function withdraw(){
        if(session()->has('card')){
            $formAmount = request('amount');

            // get Card and it's Old Balance
            $card_id = session()->get('card')->id;
            $card = Card::findOrFail($card_id);
            $balance = $card->balance;
            $newBalance = $balance - $formAmount;

            if ($formAmount <= $balance and $formAmount > 0) {
                //Gather Data for a Transaction
                $trans = new Transaction();
                $trans->trans_dateTime = date("Y-m-d H:i:s");
                $trans->withdrawn = request('amount');
                $trans->remaining_balance = $newBalance;
                $trans->card_id = session()->get('card')->id;

                //Create Transaction
                $trans->save();

                //Update Card Balance
                $card->balance = $newBalance;
                $card->save();

                // Update Session Data
                session()->forget('card');
                session()->put('card' , $card);

                return 1;
            } elseif ($formAmount > $balance) {
                return 0;
            } else {
                return 'error';
            }

            
            // return redirect('/withdraw');
        } else {
            return redirect('/login');
        }
    }

    public function transactionView()
    {

        if(session()->has('card')){
            $card_id = session()->get('card')->id;
            $transactions = Transaction::where('card_id', $card_id)
                            ->orderBy('id', 'desc')
                            ->take(5)
                            ->get();                
           
            
            return view('transaction' , compact('transactions'));
        } else {
            return redirect('/login');
        }
    
    }

    public function logout(){
        session()->flush();
        return redirect('/login'); 
    }

    public function loginAjax(){
        $validatedAttributes = request()->validate([
            'cardNumber' => ['required','numeric','digits:8'],
            'pinCode' => ['required','numeric','digits:4']
        ]);
        
        $cardNumber = request('cardNumber');
        $pinCode = request('pinCode');
        
        $Card = new Card();
        $Card = Card::where('card_number', $cardNumber)->first();
        
         return view('home' , compact('Card'));
    }

    


    public function bubleSort($arr = array()){
        $len = count($arr);
        $temp = 0;
        for ($i = 0; $i < $len; $i++) {
            for ($j = 1; $j < ($len - $i); $j++) {

                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
      
    }

    public function sort(){
        $numbers = array();
        for ($a = 0; $a < 100; $a++){
            $numbers[$a] = rand(1,100);
        }
        
        $len = count($numbers);
        $temp = 0;
        for ($i = 0; $i < $len; $i++) {
            for ($j = 1; $j < ($len - $i); $j++) {

                if ($numbers[$j - 1] > $numbers[$j]) {
                    $temp = $numbers[$j - 1];
                    $numbers[$j - 1] = $numbers[$j];
                    $numbers[$j] = $temp;
                }
            }
        }
        return view('sort',compact('numbers'));
    }


    
}
