<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenses extends Model
{
    use HasFactory;
    
    protected $table = 'expenses';
    
    protected $fillable = ['date','expense_type','expense','comment'];

}
