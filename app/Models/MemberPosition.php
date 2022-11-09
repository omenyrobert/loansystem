<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPosition extends Model
{
    use HasFactory;

    protected $table = 'member_positions';
    protected $fillable = ['member_id','position_id'];
}
