<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface AuthService
{
    /**
     * Создание пользователя
     *
     * @param mixed $fields
     * @return void
     */
    public function createUser(mixed $fields): User;

    /**
     * Пользователь вышел
     *
     * @return bool
     */
    public function logoutUser(): bool;

    /**
     * Пользователь вышел из всего
     *
     * @param User $user
     * @param mixed $fields
     * @return bool
     */
    public function logoutUserFromEverywhere(User $user, mixed $fields): bool;

    /**
     * Проверка пароля
     *
     * @param User $user
     * @param string $password
     * @return bool
     */
    public function hasUserPassword(User $user, string $password): bool;

    /**
     * Получить пользователя
     *
     * @param mixed $fields
     * @return User|null
     */
    public function getUser(mixed $fields): ?User;

    /**
     * Изменить информацию пользователя
     *
     * @param mixed $fields
     * @return bool
     */
    public function setUser(mixed $fields): bool;

    /**
     * Изменить пароль
     *
     * @param mixed $fields
     * @return bool
     */
    public function setUserPassword(mixed $fields): bool;

    /**
     * Получить token для пользователя
     *
     * @param User $user
     * @return string
     */
    public function getUserToken(User $user): string;
}
