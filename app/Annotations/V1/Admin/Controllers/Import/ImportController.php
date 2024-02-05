<?php

namespace App\Annotations\V1\Admin\Controllers\Import;

use App\Annotations\V1\Admin\Controllers\Controller;

class ImportController extends Controller
{
    /**
     * Import payroll
     *
     * @OA\Post(
     *     path="/import/payroll",
     *     tags={"Import"},
     *     security={ {"admin": {} }},
     *    description="Download template [here](/storage/downloads/CFW_template.xlsx)",
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",     
     *                @OA\Property(
     *                    property="id_number",
     *                     title="ID Number",
     *                     title="year",
     *                     type="string",
     *                 ),
     *               @OA\Property(
     *                     property="modality",
     *                     title="modality",
     *                     type="string",
     *                      enum={"CFW"}
     *                 ),
     *                 @OA\Property(
     *                     property="year",
     *                     title="year",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="excel_file",
     *                     title="excel_file",
     *                     type="string",
     *                     format="binary",
     *                 ),
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
