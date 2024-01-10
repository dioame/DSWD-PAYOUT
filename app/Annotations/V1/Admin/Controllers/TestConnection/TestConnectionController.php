<?php

namespace App\Annotations\V1\Admin\Controllers\TestConnection;

use App\Annotations\V1\Admin\Controllers\Controller;

class TestConnectionController extends Controller
{
    /**
     * Test connection mobile
     *
     * @OA\Post(
     *     path="/test-connection/mobile",
     *     tags={"Test connection"},
     *     security={ {"customer": {} }},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",     
     *              @OA\Property(
     *                  property="id_number",
     *                  title="id_number",
     *                  type="string",
     *              ),   
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
    "connection": {
      "id_number": "16-11570",
      "status": 1,
      "created_at": "2024-01-08 07:46:32"
    },
    "encoded_payroll": {
      "payroll_count": 1,
      "payroll": {
   {
          "id": 5,
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

        /**
     * Test connection mobile disconnect
     *
     * @OA\Patch(
     *     path="/test-connection/mobile/disconnect",
     *     tags={"Test connection"},
     *     security={ {"customer": {} }},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *         mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *              type="object",     
     *              @OA\Property(
     *                  property="id_number",
     *                  title="id_number",
     *                  type="string",
     *              ),   
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
    "id_number": "16-11570",
    "status": 1,
    "created_at": "2024-01-08 01:04:17"
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
