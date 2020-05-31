<?php

namespace App\Http\Controllers;

use App\Model\Earning;
use App\Model\Finance;
use App\Model\Spending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Calculate()
    {
        $earnings = DB::table('earnings')->pluck('amount');
        $spendings = DB::table('spendings')->pluck('amount');
        $my_balance = 0;
        $earnCount = count($earnings);
        $spendCount = count($spendings);
        if ($earnCount > $spendCount) {
            for ($i = 0; $i < $earnCount; $i++) {
                $my_balance += $earnings[$i] - $spendings[$i];
            }
        } else {
            for ($i = 0; $i < $spendCount; $i++) {
                $my_balance += $earnings[$i] - $spendings[$i];
            }

        }
        DB::table('finances')->insert(['my_balance' =>$my_balance, 'created_at' => date("d.m.y")]);

        return redirect(route('finance.index'));
    }
    public function index()
    {
        $my_balance = DB::table('finances')->pluck('my_balance')->sortBy('created_at');
        $my_balance = $my_balance[0];
        $earnings = Earning::all();
        $spending = Spending::all();

        return view('finance.index',  ['my_balance'=>$my_balance, 'earnings' => $earnings, 'spending' => $spending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
