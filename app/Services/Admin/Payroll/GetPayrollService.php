<?php

namespace App\Services\Admin\Payroll;

use App\Services\BaseService;
use App\Models\Admin\Payroll;

class GetPayrollService extends BaseService
{
    public function execute($params = null)
    {
        $query =  Payroll::orderByRaw("CAST(payroll_no AS UNSIGNED) DESC");
        $query->paginate(10);
        return $query;   
    }
}
