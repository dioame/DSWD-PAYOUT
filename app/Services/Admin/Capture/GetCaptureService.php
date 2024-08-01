<?php

namespace App\Services\Admin\Capture;

use App\Services\BaseService;
use App\Models\Admin\Capture;
use App\Models\Admin\Payroll;
use Illuminate\Support\Facades\DB;

class GetCaptureService extends BaseService
{
    public function execute($params = null)
    {
        if($params['range']){
            $range = explode("-",$params['range']);
            $range_from = trim($range[0]);
            $range_to = isset($range[1]) ? trim($range[1]) : trim($range[0]);
            $range_to = empty($range_to) ? $range_from : $range_to;
            $range_from = empty($range_from) ? $range_to : $range_from;
        }
        $total = $range_to - $range_from + 1;

        // var_dump($total);
        // die();
            
        $capture = Payroll::leftJoinSub("SELECT * FROM capture WHERE ISNULL(deleted_at)", "c",   function ($join) {
                $join->on("payroll.payroll_no", "=", "c.payroll_no")
                    ->whereColumn("payroll.municipality", "c.municipality")
                    ->whereColumn("payroll.modality", "c.modality")
                    ->whereColumn("payroll.year", "c.year");
            })
            ->orderByRaw("CAST(payroll.payroll_no as UNSIGNED) ASC")
            // ->skip($range_from - 1)
            // ->take($total)
            // ->whereBetween('payroll.payroll_no', [$range_from, $range_to])
            ->whereRaw("CAST(payroll.payroll_no AS UNSIGNED) BETWEEN ? AND ?", [$range_from, $range_to])
            ->select('payroll.payroll_no', 'payroll.name', 'c.path', 'payroll.barangay', 'payroll.municipality', 'c.captured_by', 'c.captured_at')
            ->where('payroll.municipality',$params['municipality'])
            ->where('payroll.modality',$params['modality'])
            ->where('payroll.year',$params['year'])
            ->get();
    
        return $capture;   
    }
}
