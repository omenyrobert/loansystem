<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTypes extends Model
{
    use HasFactory;
    protected $table = 'income_types';
    
    protected $fillable = ['income_type'];
}
