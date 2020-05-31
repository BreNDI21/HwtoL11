<?php

namespace App\Http\Controllers;

use App\Model\Earning;
use App\Services\EarnService;
use App\Services\FinanceServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EarningController extends Controller
{
    private $earnService;
    public function __construct()
    {
        $this->earnService = app()->make(EarnService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $earning = Earning::all();

        return view('finance.index', compact('earning'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.createEarning');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'amount' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $earn = new Earning();
            $earn->amount = $request->get('amount');
            $earn->source = $request->get('source');
            $earn->comment = $request->get('comment');
            $earn->save();
            return redirect(route('finance.index'));
        }catch (\Exception $e){
            return redirect(route('earning.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $earn = Earning::findorfail($id);
        return view('finance.showEarn', compact('earn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $earn = Earning::findorfail($id);

        return view('finance.editEarn', compact('earn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'amount' => 'required',
                'source' => 'required'
            ]);

            $earn = Earning::findorfail($id);
            $earn->amount = $request->get('amount');
            $earn->source = $request->get('source');
            $earn->comment = $request->get('comment');
            $earn->save();

            return redirect(route('earning.show', $earn->id));
        } catch (\Exception $exception) {
            return redirect(route('earning.edit', $earn->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
