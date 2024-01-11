<?php

namespace App\Services\Admin\Capture;

use App\Services\BaseService;
use App\Models\Admin\Capture;

class GetCaptureService extends BaseService
{
    public function execute($params = null)
    {
        return Capture::orderBy('payroll_no')->get();
    }
}
