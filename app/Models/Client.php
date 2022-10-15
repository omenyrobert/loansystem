<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    
    protected $fillable = [
        'spouse_name',	
        'date_of_birth',	
        'boda_stage',	
        'full_name',	
        'contact1',	
        'contact2',	
        'photo',	
        'contract',	
        'spouse_contact',	
        'place_of_residence',	
        'guarantee_name',	
        'guarantee_contact',
    ];
}
