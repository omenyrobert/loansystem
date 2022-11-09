<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseTypes;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index(){
        $expenses = [];
        $query_expenses = Expenses::all();
        foreach($query_expenses as $expense){
            $type = ExpenseTypes::find($expense->expense_type);
            $expense->type = $type;
            $expenses[] = $expense;
        }
        $expense_types = ExpenseTypes::all();
        return view('expenses.index', compact('expenses','expense_types'));
    }
    public function store(){
        Expenses::create([
            'date' => request()->date,
            'expense_type' => request()->expense_type,
            'expense' => request()->expense,
            'comment' => request()->comment
         ]);
         return redirect()->route('expense.index')
         ->with(['success' => 'expense Added successfully.']);
    }

    public function update(Request $request)
    {   
        $request->validate([	
            'expense'=> 'required',	
        ]);
        $expense = Expenses::find($request->id);
        $expense->update([
            'date'=>$request->date,
            'expense_type'=>$request->expense_type,
            'expense' => $request->expense,
            'comment'=> $request->comment
        ]);
        return redirect()->route('expense.index')
                        ->with(['success' => 'Expense type Updated successfully.']);
    }

    public function destroy($id)
    {
        $expense = Expenses::find($id);
        $expense->delete();
        return redirect()->route('expense.index')
                        ->with(['success' => 'Expense Type deleted successfully.']);
        
    }
}