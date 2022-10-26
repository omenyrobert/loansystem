<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'type_id',
        'amount',
        'client_id',
        'loan_id',
        'reschedule_date'
    ];

    public function type(){
        return $this->belongsTo(PaymentType::class,'type_id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function loan(){
        return $this->belongsTo(Loan::class,'loan_id');
    }
}
