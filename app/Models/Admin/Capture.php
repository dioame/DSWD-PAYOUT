<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capture extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payroll_no',
        'path',
        'captured_at',
        'captured_by'
    ];

    protected $table = "capture";

}
