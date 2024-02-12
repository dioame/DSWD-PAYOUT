<?php

namespace App\Services\Admin\Capture;

use App\Services\BaseService;
use App\Models\Admin\Capture;

class GetCaptureService extends BaseService
{
    public function execute($params = null)
    {
        $sql = "";
        if($params['range']){
            $range = explode("-",$params['range']);
            $range_from = trim($range[0]);
            $range_to = isset($range[1]) ? trim($range[1]) : trim($range[0]);
            $range_to = empty($range_to) ? $range_from : $range_to;
            $range_from = empty($range_from) ? $range_to : $range_from;

            $sql = "payroll_no BETWEEN $range_from AND $range_to AND deleted_at IS NULL";
        }
        
        $capture =  Capture::orderByRaw("CAST(payroll_no AS UNSIGNED) ASC")->whereRaw($sql)->get();
        return $capture;   
    }
}
