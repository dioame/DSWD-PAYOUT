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
            $range = explode(":",$params['range']);
            $range_from = trim($range[0]);
            $range_to = isset($range[1]) ? trim($range[1]) : trim($range[0]);
            $range_to = empty($range_to) ? $range_from : $range_to;
            $range_from = empty($range_from) ? $range_to : $range_from;
        }


        if (strpos(($range_from), '-') !== false) {
            // echo "String contains a hyphen.";

            $range_from_part1 = explode("-", $range_from)[0];
            $range_to_part1 = explode("-", $range_from)[1];

            $range_from_part2 = explode("-", $range_to)[0];
            $range_to_part2 = explode("-", $range_to)[1];

            $capture = Payroll::leftJoinSub("SELECT * FROM capture WHERE ISNULL(deleted_at)", "c", function ($join) {
                $join->on("payroll.payroll_no", "=", "c.payroll_no")
                    ->whereColumn("payroll.municipality", "c.municipality")
                    ->whereColumn("payroll.modality", "c.modality")
                    ->whereColumn("payroll.year", "c.year");
            }) 
            ->orderByRaw("  
                (payroll.payroll_no LIKE '%-%') DESC,
                CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', 1) AS UNSIGNED) ASC, 
                CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', -1) AS UNSIGNED) ASC
            ")
            // Ensure both the numeric parts of the payroll_no are handled
            ->whereRaw("
                CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', 1) AS UNSIGNED) BETWEEN ? AND ? 
                AND CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', -1) AS UNSIGNED) BETWEEN ? AND ?
            ", [$range_from_part1, $range_to_part1, $range_from_part2, $range_to_part2])
            ->select('payroll.payroll_no', 'payroll.name', 'c.path', 'payroll.barangay', 'payroll.municipality', 'c.captured_by', 'c.captured_at')
            ->where('payroll.municipality', $params['municipality'])
            ->where('payroll.modality', $params['modality'])
            ->where('payroll.year', $params['year'])
            ->get();

        } else {
            
            $capture = Payroll::leftJoinSub("SELECT * FROM capture WHERE ISNULL(deleted_at)", "c",   function ($join) {
                $join->on("payroll.payroll_no", "=", "c.payroll_no")
                    ->whereColumn("payroll.municipality", "c.municipality")
                    ->whereColumn("payroll.modality", "c.modality")
                    ->whereColumn("payroll.year", "c.year");
            })
            ->orderByRaw("
                (payroll.payroll_no LIKE '%-%') DESC,
                CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', 1) AS UNSIGNED) ASC, 
                CAST(SUBSTRING_INDEX(payroll.payroll_no, '-', -1) AS UNSIGNED) ASC
            ")
            // ->skip($range_from - 1)
            // ->take($total)
            // ->whereBetween('payroll.payroll_no', [$range_from, $range_to])
            ->whereRaw("CAST(payroll.payroll_no AS UNSIGNED) BETWEEN ? AND ?", [$range_from, $range_to])
            ->select('payroll.payroll_no', 'payroll.name', 'c.path', 'payroll.barangay', 'payroll.municipality', 'c.captured_by', 'c.captured_at')
            ->where('payroll.municipality',$params['municipality'])
            ->where('payroll.modality',$params['modality'])
            ->where('payroll.year',$params['year'])
            ->get();
        }

       
            
     
    
        return $capture;   
    }
}
