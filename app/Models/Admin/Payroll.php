<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payroll_no',
        'name',
        'barangay',
        'municipality',
        'modality',
        'year',
        'uploaded_by'
    ];

    protected $table = "payroll";

}
