<?php

namespace App\Services\Admin\TestConnection;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MobileConnection;
class PostConnectionService
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
