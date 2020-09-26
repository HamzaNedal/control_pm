<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'client_id',
        'provider_id',
        'title',
        'number_words',
        'information',
        'deadline',
        'added_date',
        'status',
    ];
}
