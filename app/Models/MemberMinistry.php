<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMinistry extends Model
{
    use HasFactory;
    protected $table = 'member_ministries';
    protected $fillable = ['member_id','ministry_id'];
}
