<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;
    protected $table = 'incomes';
    
    protected $fillable = ['date','income_type','income','comment'];
}
