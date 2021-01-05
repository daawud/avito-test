<?php

namespace App\Http\Responses;

use \Illuminate\Http\Response;

/**
 * Class ApiResponse
 */
class ApiResponse extends Response
{
    // <editor-fold defaultstate="collapsed" desc="▼ Swagged Documentation method ▼">
    /**
     * @OA\Schema(
     *      schema="ApiResponseErrors",
     *      type="object",
     *      description="Сообщение об ошибке",
     *      @OA\Property(
     *          property="success",
     *          type="boolean",
     *          description="Статус выполнения",
     *      ),
     *      @OA\Property(
     *          property="error_description",
     *          type="string",
     *          description="Сообщение об ошибке",
     *      ),
     *  )
     *
     * @OA\Schema(
     *      schema="ApiResponseErrorValidate",
     *      type="object",
     *      description="Сообщение об ошибке",
     *      @OA\Property(
     *          property="success",
     *          type="boolean",
     *          description="Статус выполнения",
     *      ),
     *      @OA\Property(
     *          property="error_description",
     *          type="string",
     *          description="Сообщение об ошибке",
     *      ),
     *  )

     *  @OA\Schema(
     *      schema="ApiResponseSuccess",
     *      type="object",
     *      description="Стандартный ответ API",
     *      @OA\Property(
     *          property="success",
     *          type="boolean",
     *          description="Статус выполнения",
     *      ),
     *      @OA\Property(
     *          property="data",
     *          type="string",
     *          description="data",
     *      ),
     *  )
     *
     *  @OA\Schema(
     *      schema="ApiResponseError",
     *      type="object",
     *      description="Стандартный ответ API",
     *      @OA\Property(
     *          property="success",
     *          type="boolean",
     *          description="Статус выполнения",
     *          example="false"
     *      ),
     *      @OA\Property(
     *          property="error",
     *          type="array",
     *              @OA\Items(
     *                  type="object",
     *                  ref="#/components/schemas/ApiResponseErrors"
     *              )
     *          )
     *      )
     *  )
     *  @OA\Schema(
     *      schema="ExceptionError",
     *      type="object",
     *      description="Exception ответ API",
     *      @OA\Property(
     *          property="message",
     *          type="string",
     *          description="Текст ошибки"
     *      ),
     *  )
     *
     *  @OA\Schema(
     *      schema="DefaultError",
     *      description="Default error API",
     *        @OA\Property(
     *          type="array",
     *          @OA\Items(type="string"),
     *          description="пустой массив"
     *          ),
     *       )
     *  )
     *
     */
    // </editor-fold>
    /**
     * @param null  $data
     *
     * @return mixed
     */
    public function success($data = null)
    {
        return response()->json(['data' => $data], 200);
    }
}

