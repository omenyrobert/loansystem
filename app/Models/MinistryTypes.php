<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryTypes extends Model
{
    use HasFactory;

    protected $table = 'ministry_types';

    protected $fillable = [
        'ministry'
    ];
}
