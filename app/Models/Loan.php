<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use App\Models\LoanType;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $fillable = [
        'client_id',	
        'type_of_bike',	
        'amount',	
        'number_plate',	
        'loan_type_id',	
        'loan_duration',	
        'amount_paid',
        'balance',
        'reason',
    ];

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function loan_type(){
        return $this->belongsTo(LoanType::class,'loan_type_id');
    }
    
}
