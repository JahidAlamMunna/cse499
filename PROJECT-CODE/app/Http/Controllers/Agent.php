<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class Agent extends Controller
{
    public function index()
    {
        return view('agentsimulator.index');
    }

    public function paid(Request $request)
    {
        $amount = $request->amount;
        $transaction_id = Str::random(16);

        DB::table('payments_received')->insert(
            [ 
                'amount' => $amount,
                'transaction_id' => $transaction_id,
                'created_at' => date('Y-m-d H:i:s')

            ]
        );

        return view('agentsimulator.success', ['amount' => $amount, 'transaction_id' => $transaction_id]);
    }

}
