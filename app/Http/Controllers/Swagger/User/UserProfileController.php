<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;

/**
 * @OA\Patch(
 *     path="/api/user/profiles",
 *     summary="Обновление данных профиля принадлажащего авторизированному пользователю",
 *     tags={"Пользовательские функции (Данные Профиля)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="first_name", type="string", example="Иван"),
 *                     @OA\Property(property="last_name", type="string", example="Иванов"),
 *                     @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                     @OA\Property(property="login", type="string", example="Noone"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="first_name", type="string", example="Иван"),
 *                 @OA\Property(property="last_name", type="string", example="Иванов"),
 *                 @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                 @OA\Property(property="login", type="string", example="Noone"),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 *
 *
 * @OA\Get(
 *      path="/api/user/profiles",
 *      summary="Просмотр Профиля авторизированного пользователя",
 *       tags={"Пользовательские функции (Данные Профиля)"},
 *      security={ {"bearerAuth": {} }},
 *
 *      @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="first_name", type="string", example="Иван"),
 *                  @OA\Property(property="last_name", type="string", example="Иванов"),
 *                  @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                  @OA\Property(property="login", type="string", example="Noone"),
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *      ),
 *  ),
 *
 *
 *
 *
 */
class UserProfileController extends Controller
{

}
