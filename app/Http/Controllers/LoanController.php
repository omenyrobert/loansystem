<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PaymentType;
use App\Models\Loan;
use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::with('client:id,full_name','loan_type:id,type')->latest()->paginate(5);
        $clients = Client::all(['id','full_name']);
        $payment_types = PaymentType::all(['id','type']);
        $loan_types = LoanType::all(['id','type']);
        // dd($clients);
        return view('loans.index',compact('loans','clients','payment_types','loan_types'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'client_id'=>'required',	
            'type_of_bike'=> 'required',
            'amount'=>'required',	
            'number_plate'=> 'required',	
        ]);
        $input = $request->all();
        Loan::create($input);
      
        return redirect()->route('loan.index')
                        ->with(['success' => 'Loan created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::with('client:id,full_name')->where('id',$id)->first();
        return view('loans.show',compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $clients = Client::all(['id','full_name']);
        return view('loans.edit',compact('loan','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
        $request->validate([
            'client_id'=>'required',	
            'type_of_bike'=> 'required',
            'amount'=>'required',	
            'number_plate'=> 'required',	
        ]);
        $input = $request->all();
        Loan::create($input);
      
        return redirect()->route('loan.index')
                        ->with(['success' => 'Loan updated successfully.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
