<?php

namespace App\Http\Controllers;

use App\Model\Spending;
use App\Services\SpendService;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    private $spendService;
    public function __construct()
    {
        $this->spendService = app()->make(SpendService::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spending = Spending::all();

        return view('finance.index', compact('spending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.createSpending');
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
                'purpose' => 'required',
                'comment' => 'required'
            ]);
            $spend = new Spending();
            $spend->amount = $request->get('amount');
            $spend->purpose = $request->get('purpose');
            $spend->comment = $request->get('comment');
            $spend->save();
            return redirect(route('finance.index'));
        }catch (\Exception $e){
            return redirect(route('spending.create'));
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
        $spend = Spending::findorfail($id);
        return view('finance.showSpend', compact('spend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spend = Spending::findorfail($id);

        return view('finance.editSpend', compact('spend'));
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
                'purpose' => 'required'
            ]);

            $spend = Spending::findorfail($id);
            $spend->amount = $request->get('amount');
            $spend->purpose = $request->get('purpose');
            $spend->comment = $request->get('comment');
            $spend->save();
            return redirect(route('spending.show', $spend->id));
        } catch (\Exception $exception) {
            return redirect(route('spending.edit', $spend->id));
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
