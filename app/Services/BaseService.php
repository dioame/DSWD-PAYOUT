<?php

namespace App\Services;

use App\Models\Admin\Capture;
use App\Models\Admin\Payroll;

class BaseService
{
    protected function getCapture($id_number = null){
        if($id_number){
            $capture = Capture::where(['captured_by'=>$id_number])->orderBy('created_at', 'desc')->paginate(10);
        }else{
            $capture = Capture::paginate(10);
        }

        $counts = $capture->countBy('payroll_no');
        return $capture->map(function ($row) use ($counts) {
            $isDuplicate = $counts[$row->payroll_no] > 1;

            $payroll = Payroll::where(['payroll_no'=>$row->payroll_no])->first();

            return [
                'id' => $row->id,
                'payroll_no' => $row->payroll_no,
                'path' => $row->path,
                'is_duplicate' => $isDuplicate,
                'name' => $payroll ? $payroll->name : null,
                'created_at' => $row->created_at->toDateTimeString()
            ];
        });
        
    }
}
