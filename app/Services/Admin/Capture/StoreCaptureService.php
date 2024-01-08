<?php

namespace App\Services\Admin\Capture;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Capture;
class StoreCaptureService
{
    public function execute($params)
    {
        $conn = MobileConnection::create([
            'id_number' => $params['id_number'],
            'status' => 1
        ]);

        return $conn;

    }
}
