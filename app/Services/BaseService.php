<?php

namespace App\Services;

use App\Models\Admin\Capture;
class BaseService
{
    protected function getCapture($id_number = null){
        if($id_number){
            $capture = Capture::where(['captured_by'=>$id_number])->get();
        }else{
            $capture = Capture::all();
        }

        $counts = $capture->countBy('payroll_no');
        return $capture->map(function ($row) use ($counts) {
            $isDuplicate = $counts[$row->payroll_no] > 1;

            return [
                'id' => $row->id,
                'payroll_no' => $row->payroll_no,
                'path' => $row->path,
                'is_duplicate' => $isDuplicate,
                'created_at' => $row->created_at->toDateTimeString()
            ];
        });
        
    }
}
