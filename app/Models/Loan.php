<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $fillable = [
        'client_id',	
        'type_of_bike',	
        'amount',	
        'number_plate',	
        'type_of_loan',	
        'loan_duration',	
        'reason',
    ];

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
    
}
