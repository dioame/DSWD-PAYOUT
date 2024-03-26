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
        'uploaded_by',
        'is_claimed_no_picture'
    ];

    protected $table = "payroll";

    public function captures()
    {
        return $this->hasMany(Capture::class,'payroll_no','payroll_no');
    }

}
