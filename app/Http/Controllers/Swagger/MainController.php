<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 *
 * @OA\PathItem(
 *     path="/api/"
 *     ),
 * @OA\Info(
 *     title="TaskManager DOC API",
 *     version="1.0.0"
 * ),
 *
 * @OA\Components(
 *     @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/login",
 *     summary="Логин",
 *     tags={"Авторизация и Создание аккаунта"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string", example="test@example.com"),
 *                     @OA\Property(property="password", type="string", example="123123123"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="123"),
 *             @OA\Property(property="token_type", type="string", example="bearer"),
 *             @OA\Property(property="expires_in", type="integer", example=48000),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 * @OA\Post(
 *     path="/api/users",
 *     summary="Создание пользователя",
 *     tags={"Авторизация и Создание аккаунта"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Timmy"),
 *                     @OA\Property(property="email", type="string", example="test@example.com"),
 *                     @OA\Property(property="password", type="string", example="123123123"),
 *                     @OA\Property(property="confirm_password", type="string", example="123123123"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Timmy"),
 *             @OA\Property(property="email", type="string", example="test@example.com"),
 *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3VzZXJzIiwiaWF0IjoxNzE5MjQzODAxLCJleHAiOjIwNzkyNDM4MDEsIm5iZiI6MTcxOTI0MzgwMSwianRpIjoidTRaeEdTVElEWDhyTlIyQiIsInN1YiI6IjE0IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.mMgNmEDIP6xEnnIAO5WhrAXsW--uIHBInLbyCHmS9DY"),
 *             @OA\Property(property="profile", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="first_name", type="string", example="Ivan"),
 *                 @OA\Property(property="last_name", type="string", example="Dyrak"),
 *                 @OA\Property(property="date_of_birth", type="date", example="10.10.1990"),
 *                 @OA\Property(property="login", type="string", example="Noone"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Content",
 *     ),
 * ),
 *
 *
 **/

class MainController extends Controller
{
}
