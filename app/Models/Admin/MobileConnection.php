<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
class MobileConnection extends Model
{
    protected $fillable = [
        'id_number',
        'status',
        'diconnected_at',
        'expired_at'
    ];

    protected $table = "mobile_connection";

}
