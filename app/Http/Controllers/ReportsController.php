<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use App\Models\Expenses;
use App\Models\IncomeTypes;
use App\Models\ExpenseTypes;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incomes = [];
        $query_incomes = Incomes::all();
        foreach($query_incomes as $income){
            $type = IncomeTypes::find($income->income_type);
            $income->type = $type;
            $incomes[] = $income;
        }
        $income_types = IncomeTypes::all();
        
        $expenses = Expenses::all();
        $expenses = [];
        $query_expenses = Expenses::all();
        foreach($query_expenses as $expense){
            $type = ExpenseTypes::find($expense->expense_type);
            $expense->type = $type;
            $expenses[] = $expense;
        }
        $expense_types = ExpenseTypes::all();
        return view('reports.index', compact('expense_types','expenses','income_types','incomes'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
