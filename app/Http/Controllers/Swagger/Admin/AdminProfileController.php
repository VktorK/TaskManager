<?php

namespace App\Http\Controllers\Swagger\Admin;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Get(
 *       path="/api/admin/profiles",
 *       summary="Просмотр Профилей всех пользователей",
 *       tags={"Админские функции (Данные Профиля)"},
 *       security={ {"bearerAuth": {} }},
 *
 *       @OA\Response(
 *           response=200,
 *           description="ok",
 *           @OA\JsonContent(
 *                   @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="first_name", type="string", example="Иван"),
 *                   @OA\Property(property="last_name", type="string", example="Иванов"),
 *                   @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                   @OA\Property(property="login", type="string", example="Noone"),
 *                   @OA\Property(property="user_id", type="integer", example=1),
 *                   @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *           ),
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *       ),
 *   ),
 *
 *
 * @OA\Get(
 *        path="/api/admin/profiles/{profile}",
 *        summary="Просмотр Профиля пользователя",
 *        tags={"Админские функции (Данные Профиля)"},
 *        security={ {"bearerAuth": {} }},
 *        @OA\Parameter(
 *            description="id profile",
 *            in="path",
 *            name="profile",
 *            required=true,
 *            example=1
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="ok",
 *            @OA\JsonContent(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="first_name", type="string", example="Иван"),
 *                    @OA\Property(property="last_name", type="string", example="Иванов"),
 *                    @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                    @OA\Property(property="login", type="string", example="Noone"),
 *                    @OA\Property(property="user_id", type="integer", example=1),
 *                    @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *            ),
 *        ),
 *        @OA\Response(
 *            response=401,
 *            description="Unauthorized",
 *        ),
 *    ),
 *
 *
 *
 *
 * @OA\Patch(
 *     path="/api/admin/profiles/{profile}",
 *     summary="Обновление данных профиля пользователя",
 *     tags={"Админские функции (Данные Профиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *          description="id profile",
 *          in="path",
 *          name="profile",
 *          required=true,
 *          example=1
 *      ),
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
 *      @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="first_name", type="string", example="Иван"),
 *                  @OA\Property(property="last_name", type="string", example="Иванов"),
 *                  @OA\Property(property="date_of_birth", type="date", example="07-05-1985"),
 *                  @OA\Property(property="login", type="string", example="Noone"),
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *              )),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unautoruzed",
 *      ),
 *  ),
 *
 *
 *
 */




class AdminProfileController extends Controller
{

}
