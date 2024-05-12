<?php

namespace App\Services\Admin\Capture;

use App\Services\BaseService;
use App\Models\Admin\Capture;

class StoreCaptureService extends BaseService
{
    public function execute($params)
    {
        Capture::create([
            'payroll_no' => $params['payroll_no'],
            'path' => $params['path'],
            'captured_by' => $params['id_number'],
            'captured_at' => now()
        ]);

        $capture = Capture::where(['captured_by'=>$params['id_number']]) 
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        return [
            'payroll_count' => count($capture),
            'payroll' => $this->getCapture($params['id_number'])
        ];
    }
}
