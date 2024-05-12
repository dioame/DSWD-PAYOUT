<?php

namespace App\Services\Admin\TestConnection;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MobileConnection;
class PatchConnectionService
{
    public function execute($params)
    {
        $conn = MobileConnection::where(['id_number' => $params['id_number']])->update([
            'status' => 0,
            'disconnected_at' => now()
        ]);

        return $conn;

    }
}
