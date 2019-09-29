<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    //
    public function displayPage()
    {
        return view('transact');
    }

    public function initiateTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric'
        ]);
        $data = $request->all();
        $transaction = Transaction::create($data);
        //echo $transaction;
        $curl = curl_init();

        $email = $transaction->email;
        $amount = $transaction->amount * 100;  //the amount in kobo. This value is actually NGN 300

        $paystack = config('app.paystack');

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'email'=>$email,
        ]),
        CURLOPT_HTTPHEADER => [
            "authorization: Bearer " .$paystack , //replace this with your own test key
            "content-type: application/json",
            "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response, true);

        if (!$tranx['status']) {
            // there was an error from the API
            print_r('API returned error: ' . $tranx['message']);
        }

        // comment out this line if you want to redirect the user to the payment page
        //print_r($tranx);


        // redirect to page so User can pay
        // uncomment this line to allow the user redirect to the payment page
        //header('Location: ' . $tranx['data']['authorization_url']);
        return redirect($tranx['data']['authorization_url']);
    }
}