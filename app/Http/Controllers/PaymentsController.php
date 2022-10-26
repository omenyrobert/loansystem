<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\Loan;
use App\Models\Payments;
use App\Models\PaymentType;
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
        $types = PaymentType::all(['id','type']);
        $payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                             ->orderBy('id','DESC')
                             ->get();
        return view('payments.index',compact('payments','types'))->with('i');                
    }

    public function generate()
    {
        $end = Carbon::parse(request()->end_date)->format('Y-m-d');
        $start = Carbon::parse(request()->start_date)->format('Y-m-d');
        $types = PaymentType::all(['id','type']);
        if(is_null(request()->type)){
            $payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
            ->whereDate('created_at','>=',$start)
            ->whereDate('created_at','<=',$end)
            ->orderBy('id','DESC')
            ->get();
        }else{
            $payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
            ->whereDate('created_at','>=',$start)
            ->whereDate('created_at','<=',$end)
            ->where('type_id',request()->type)
            ->orderBy('id','DESC')
            ->get();
        }
        return view('payments.index',compact('payments','types'))->with('i');
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
        
            //
            $request->validate([
                'client_id'=>'required',	
                'amount'=> 'required',	
                'type_id'=> 'required',
                'reschedule_date' => 'nullable'
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
            if($request->type_id == 2){
                // dd($request->all());
                Payments::create([
                    'reschedule_date' => $request->reschedule_date,
                    'client_id' => $request->client_id,
                    'amount' => $request->amount,
                    'type_id' => $request->type_id,
                    'loan_id' => $request->loan_id
                ]);
              
                return redirect()->route('loan.index')
                                ->with(['success' => 'Payments Rescheduled successfully.']);
            }
            $other = $request->all();
            Payments::create($other);
            return redirect()->route('loan.index')
            ->with(['success' => 'Payments created successfully.']);
        
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

    public function today()
    {
        $today_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id',])
                               ->whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                               ->orderBy('id','DESC')
                               ->get();
        return view('dailyReports',compact('today_payments'))->with('i');
    }

    public function missed_payments()
    {
        $missed_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                                     ->where('type_id',1)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('MissedPayments',compact('missed_payments'))->with('i');                             
    }

    public function fine_payments()
    {
        $fine_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                                     ->where('type_id',5)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('FinePayments',compact('fine_payments'))->with('i');                             
    }

    public function reschedule_payments()
    {
        $reschedule_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                                     ->where('type_id',2)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('RescheduledPayments',compact('reschedule_payments'))->with('i');                             
    }
}
