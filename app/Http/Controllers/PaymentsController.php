<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\Loan;
use App\Models\Client;
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
        $clients = Client::all(['id','full_name']);
        $payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                             ->orderBy('id','DESC')
                             ->get();
        return view('payments.index',compact('payments','types','clients'))->with('i');                
    }

    public function generate()
    {
        $end = Carbon::parse(request()->end_date)->format('Y-m-d');
        $start = Carbon::parse(request()->start_date)->format('Y-m-d');
        $types = PaymentType::all(['id','type']);
        $clients = Client::all(['id','full_name']);
        $results = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
            ->whereDate('created_at','>=',$start)
            ->whereDate('created_at','<=',$end)
            ->where('type_id',request()->type)  
            ->orderBy('id','DESC');
       if(request()->client == 'all')
           $results;
       if(request()->client != 'all')
           $results->where('client_id',request()->client);
       $payments = $results->get(); 
        return view('payments.index',compact('payments','types','clients'))->with('i');
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
        // if(\Carbon\Carbon::now()->format('h:i A') > '8:00 PM'){
        //     dd(\Carbon\Carbon::now()->format('h:i A'));
        // }
            $request->validate([
                'client_id'=>'required',	
                'amount'=> 'required',	
                'type_id'=> 'required',
                'reschedule_date' => 'nullable'
            ]);
            if($request->type_id == 3){
                $loan = Loan::find($request->loan_id);
                if(\Carbon\Carbon::now()->format('h:i A') <= '8:00 PM'){
                    $balance = 0;
                    $paid = $loan->amount_paid + $request->amount;
                    if($loan->amount_paid == 0){
                      $balance = $loan->amount - $request->amount;
                    }else{
                      $balance = $loan->amount - $paid;
                    }
                    $loan->update([
                        'amount_paid' => $paid,
                        'balance' => $balance
                    ]);
                    Payments::create([
                        'client_id' => $request->client_id,
                        'amount' => $request->amount,
                        'type_id' => $request->type_id,
                        'cleared' => 1,
                        'loan_id' => $request->loan_id
                    ]);
                    
                    return redirect()->route('loan.index')
                    ->with(['success' => 'Payments created successfully.']);
                } else {
                    $balance = 0;
                    $amount_to_save = $request->amount - 5000;
                    $paid = $loan->amount_paid + $amount_to_save;
                    if($loan->amount_paid == 0){
                        $balance = $loan->amount - $amount_to_save;
                      }else{
                        $balance = $loan->amount - $paid;
                      }
                      $loan->update([
                          'amount_paid' => $paid,
                          'balance' => $balance
                      ]);
                      Payments::create([
                          'client_id' => $request->client_id,
                          'amount' => $amount_to_save,
                          'type_id' => $request->type_id,
                          'cleared' => 1,
                          'loan_id' => $request->loan_id
                      ]);
                      Payments::create([
                        'client_id' => $request->client_id,
                        'amount' => 5000,
                        'type_id' => 5,
                        'cleared' => 0,
                        'loan_id' => $request->loan_id
                    ]);
                      
                      return redirect()->route('loan.index')
                      ->with(['success' => 'Payments created successfully.']);
                }
            }
            if($request->type_id == 2){
                Payments::create([
                    'reschedule_date' => $request->reschedule_date,
                    'client_id' => $request->client_id,
                    'amount' => $request->amount,
                    'type_id' => $request->type_id,
                    'loan_id' => $request->loan_id,
                    'cleared' => 0
                ]);
              
                return redirect()->route('loan.index')
                                ->with(['success' => 'Payments Rescheduled successfully.']);
            }
              if($request->type_id == 5){
                $loan = Loan::find($request->loan_id); 
                $loan->update([
                  'amount' => $loan->amount + $request->amount,
                  'balance' => $loan->balance + $request->amount
                ]);
                Payments::create([
                    'client_id' => $request->client_id,
                    'amount' => $request->amount,
                    'type_id' => $request->type_id,
                    'loan_id' => $request->loan_id,
                    'cleared' => 0
                ]);
              
                return redirect()->route('loan.index')
                                ->with(['success' => 'Fine Payment Recorded successfully.']);
            }
            if ($request->type_id == 4){
                $loan = Loan::find($request->loan_id);
                $balance = 0;
                $paid = $loan->amount_paid + $request->amount;
                if($loan->amount_paid == 0){
                  $balance = $loan->amount - $request->amount;
                }else{
                  $balance = $loan->amount - $paid;
                }
                $loan->update([
                    'amount_paid' => $paid,
                    'balance' => $balance
                ]);
                // $input = $request->all();
                Payments::create([
                    'client_id' => $request->client_id,
                    'amount' => $request->amount,
                    'type_id' => $request->type_id,
                    'cleared' => 1,
                    'loan_id' => $request->loan_id
                ]);
                
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
                                     ->where('type_id',1)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('MissedPayments',compact('missed_payments'))->with('i');                             
    }

    public function fine_payments()
    {
        $fine_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->where('type_id',5)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('FinePayments',compact('fine_payments'))->with('i');                             
    }

    public function reschedule_payments()
    {
        $reschedule_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->where('type_id',2)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('RescheduledPayments',compact('reschedule_payments'))->with('i');                             
    }

    public function normal_payments()
    {
        $normal_payments = Payments::with(['client:id,full_name','type','loan:id,amount,balance,loan_type_id'])
                                     ->where('type_id',3)
                                     ->orderBy('id','DESC')
                                     ->get();
        return view('NormalPayments',compact('normal_payments'))->with('i');                             
    }

    public function clear_payment()
    {
        $payment = Payments::find(request()->payment_id);
        $loan = Loan::find(request()->loan_id);
        $balance = $loan->balance - $payment->amount;
        $paid = $payment->amount + $loan->amount_paid;

        $loan->update([
            'balance' => $balance,
            'amount_paid' => $paid
        ]);

        $payment->update([
            'cleared' => 1
        ]);
        return redirect()->back();
    }
    public function auto_missed_payments_record()
    {
        try {
            $yesterday_payments = Payments::whereDate('created_at',\Carbon\Carbon::yesterday()->format('Y-m-d'))
                                            ->where('type_id',1)
                                            ->get();
            $today_payments = Payments::whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                                            ->where('type_id',1)
                                            ->get();                               
            if((count($yesterday_payments) > 0) || (count($today_payments) > 0)){
                return redirect()->route('payment.missed')->with([
                    'error' => 'Missed Payments Recorded already'
                ]); 
            }                                
            $unpaid_loans = Loan::where('balance','>',0)->get();

            $unmade_payments = [];

            foreach($unpaid_loans as $loan){
                $check_if_paid = Payments::where('created_at',\Carbon\Carbon::yesterday())
                                           ->where('loan_id',$loan->id)
                                           ->where('cleared',1)
                                           ->first();
                if(is_null($check_if_paid)){
                    $unmade_payments[] = $loan;
                }                           
            }

            foreach($unmade_payments as $payment){
                Payments::create([
                    'client_id' => $payment->client_id,
                    'amount' => 20000,
                    'type_id' => 1,
                    'loan_id' => $payment->id,
                    'cleared' => 0
                ]);
            }
            return redirect()->route('payment.missed')->with([
                'sucsess' => 'Recorded Successfully'
            ]);    
        } catch (\Throwable $th) {
            return $th->getMessage();
        }                       
                                     
    }
}
