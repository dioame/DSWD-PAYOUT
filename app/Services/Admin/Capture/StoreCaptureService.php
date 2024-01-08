<?php

namespace App\Services\Admin\Capture;

use App\Models\Admin\Capture;
class StoreCaptureService
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
        ->get();

        return [
            'payroll_count' => count($capture),
            'payroll' => $capture->map(function ($row) {
                return [
                    'payroll_no' => $row->payroll_no,
                    'path' => $row->path,
                    'created_at' => $row->created_at->toDateTimeString()
                ];
            })
        ];
    }
}
