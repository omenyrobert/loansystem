<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        {
            //
            $request->validate([
                'client_id'=>'required',	
                'amount'=> 'required',	
                'type_id'=> 'required',	
            ]);
            if($request->type_id == 3){
                $loan = Loan::find($request->loan_id);
                $balance = $loan->amount - $request->amount;
                $loan->update([
                    'amount_paid' => $request->amount,
                    'balance' => $balance
                ]);
                $input = $request->all();
                Payments::create($input);
              
                return redirect()->route('loan.index')
                                ->with(['success' => 'Payments created successfully.']);
            }
            $other = $request->all();
            Payments::create($other);
            return redirect()->route('loan.index')
            ->with(['success' => 'Payments created successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(payments $payments)
    {
        //
    }
}
