<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AuthLoginRequest;
use App\Http\Requests\Api\V1\AuthRegisterRequest;
use App\Http\Requests\Api\V1\AuthRestorePasswordRequest;
use App\Http\Requests\Api\V1\AuthUserUpdateRequest;
use App\Models\User;
use App\Services\Interfaces\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Аутентификация/регитсрация пользователя
 */
class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    )
    {
        // Здесь могла быть ваша реклама
    }

    /**
     * Регистрация пользователя
     *
     * @param AuthRegisterRequest $request
     * @return JsonResponse
     */
    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $user = $this->authService->createUser($request->validated());
        $token = $this->authService->getUserToken($user);

        return $this->getUserWithToken($user, $token, ResponseAlias::HTTP_CREATED);
    }

    /**
     * Восстановление/изменение пароля пользователя
     *
     * @param AuthRestorePasswordRequest $request
     * @return Response
     */
    public function restorePassword(AuthRestorePasswordRequest $request): Response
    {
        $this->authService->setUserPassword($request->validated());

        return response(null)->setStatusCode(ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Обновление пользовательской информации
     *
     * @param AuthUserUpdateRequest $request
     * @return Response
     */
    public function userUpdate(AuthUserUpdateRequest $request): Response
    {
        $this->authService->setUser($request->validated());

        return response(null)->setStatusCode(ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Аутентификация пользователя
     *
     * @param AuthLoginRequest $request
     * @return JsonResponse
     */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $user = $this->authService->getUser($request->validated());
        $token = $this->authService->getUserToken($user);

        return $this->getUserWithToken($user, $token, ResponseAlias::HTTP_OK);
    }

    /**
     * Пользовательский выход из системы
     *
     * @return Response
     */
    public function logout(): Response
    {
        $this->authService->logoutUser();

        return response(null)->setStatusCode(ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Ответ в виде view
     *
     * @param User $user
     * @param string $token
     * @param int $statusCode
     * @return JsonResponse
     */
    private function getUserWithToken(User $user, string $token, int $statusCode): JsonResponse
    {
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'token' => $token
        ], $statusCode);
    }
}
