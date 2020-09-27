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
        'files',
    ];

    public function getClient()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function getProvider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public static function getStatusAttribute($val)
    {
        switch ($val) {
            case 0:
                return "Not sent";
                break;
            case 1:
                return "Waiting accept";
                break;
            case 2:
                return "On progress";
                break;
            case 3:
                return "Rejected";
                break;
            case 4:
                return "Compeleted";
                break;
            case 5:
                return "Edit";

        }
    }
}
