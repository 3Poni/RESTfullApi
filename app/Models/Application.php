<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'dealer_name' ,
        'dealer_manager' ,
        'credit_sum' ,
        'credit_term' ,
        'credit_rate' ,
        'credit_description' ,
        'credit_status',
        'bank_id'
    ];

    protected $hidden = [
        'bank_id'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
