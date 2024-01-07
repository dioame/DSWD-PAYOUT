<?php

namespace App\Annotations\V1\Admin\Controllers\Capture;

use App\Annotations\V1\Admin\Controllers\Controller;

class CaptureController extends Controller
{
    /**
     * Get Transactions
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
                        "path": "/storage/pictures/2000_1704634259.jpg"
                    }
                },
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
