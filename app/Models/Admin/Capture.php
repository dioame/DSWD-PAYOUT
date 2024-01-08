<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
class Capture extends Model
{
    protected $fillable = [
        'payroll_no',
        'path',
        'captured_at',
        'captured_by'
    ];

    protected $table = "capture";

}
