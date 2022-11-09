<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class churchPositions extends Model
{
    use HasFactory;

    protected $table = 'church_positions';

    protected $fillable = [
        'position'
    ];
}
