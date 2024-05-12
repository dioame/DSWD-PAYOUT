<?php

namespace App\Annotations\V1\Admin\Controllers\Payroll;

use App\Annotations\V1\Admin\Controllers\Controller;

class PayrollController extends Controller
{
    /**
     * Get payroll
     *
     * @OA\Get(
     *     path="/payroll",
     *     tags={"Payroll"},
     *     security={ {"admin": {} }},
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
                example= {
  "status": "success",
  "description": "OK",
  "data": {
    "current_page": 1,
    "data": {
      {
        "id": 101484,
        "payroll_no": "1",
        "name": "ACEVEDO, FRANCISCO MESO",
        "barangay": "BATUNAN",
        "municipality": "Tagbina",
        "modality": "CFW",
        "year": 2024,
        "uploaded_by": "16-11570",
        "created_at": "2024-02-05T08:58:59.000000Z",
        "updated_at": "2024-02-05T08:58:59.000000Z",
        "deleted_at": null
      }
    },
    "first_page_url": "http://dswd-payout.test/api/v1/admin/payroll?page=1",
    "from": 1,
    "last_page": 1015,
    "last_page_url": "http://dswd-payout.test/api/v1/admin/payroll?page=1",
    "links": {
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http://dswd-payout.test/api/v1/admin/payroll?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "...",
        "active": false
      },
      {
        "url": "http://dswd-payout.test/api/v1/admin/payroll?page=1014",
        "label": "1014",
        "active": false
      },
      {
        "url": "http://dswd-payout.test/api/v1/admin/payroll?page=1015",
        "label": "1015",
        "active": false
      },
      {
        "url": "http://dswd-payout.test/api/v1/admin/payroll?page=2",
        "label": "Next &raquo;",
        "active": false
      }
    },
    "next_page_url": "http://dswd-payout.test/api/v1/admin/payroll?page=2",
    "path": "http://dswd-payout.test/api/v1/admin/payroll",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 10143
  }
}
     *          )
     *      ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
                example= {
                "status": "error",
                "description": "Unauthorized"
                },
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
                example= {
                "status": "error",
                "description": "Not Found"
                },
     *          )
     *      ),
     * )
     */
}
