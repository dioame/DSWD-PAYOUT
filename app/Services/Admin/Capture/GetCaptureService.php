<?php

namespace App\Services\Admin\Capture;

use App\Services\BaseService;
use App\Models\Admin\Capture;

class GetCaptureService extends BaseService
{
    public function execute($params = null)
    {
        $capture =  Capture::orderByRaw("CAST(payroll_no AS UNSIGNED) ASC")->get();
        return $capture;   
    }
}
