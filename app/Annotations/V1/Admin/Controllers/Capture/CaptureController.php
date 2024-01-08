<?php

namespace App\Annotations\V1\Admin\Controllers\Capture;

use App\Annotations\V1\Admin\Controllers\Controller;

class CaptureController extends Controller
{
    /**
     * Get Capture
     *
     * @OA\Post(
     *     path="/capture",
     *     tags={"Capture"},
     *     security={ {"customer": {} }},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",     
     *             @OA\Property(
     *                  property="id_number",
     *                  title="id_number",
     *                  type="string",
     *              ),  
     *              @OA\Property(
     *                  property="payroll_no",
     *                  title="payroll_no",
     *                  type="string",
     *                  example="2000"
     *              ),   
     *              @OA\Property(   
     *                  property="file",
     *                  title="file",
     *                  type="file",
     *                  format="binary"
     *             ),
     *          )
     *      )
     *     ), 
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
                example= {
  "status": "success",
  "description": "OK",
  "data": {
    "encoded_payroll": {
      "payroll_count": 1,
      "payroll": {
        {
          "payroll_no": "2",
          "path": "pictures/2_1704699696.jpg",
          "created_at": "2024-01-08 07:41:36"
        },
    }
    }
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
     *   @OA\Response(
     *          response="422",
     *          description="Unprocessable Content",
     *          @OA\JsonContent(
                example= {
                "message": "Payroll number required (and 1 more error)",
                "errors": {
                    "payroll_no": {
                    "Payroll number required"
                    },
                    "file": {
                    "File required"
                    }
                }
                }
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
