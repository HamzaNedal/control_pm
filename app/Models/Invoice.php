<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'down_payment',
        'payment_method',
        'provider_id',
        'file',

    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function getProvider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
