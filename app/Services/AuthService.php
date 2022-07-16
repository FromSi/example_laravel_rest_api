<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements Interfaces\AuthService
{

    /**
     * @inheritDoc
     */
    public function createUser(mixed $fields): User
    {
        return User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password'])
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getUserToken(User $user): string
    {
        return $user->createToken('authToken')->plainTextToken;
    }

    /**
     * @inheritDoc
     */
    public function logoutUser(): bool
    {
        return auth()->user()->currentAccessToken()->delete();
    }

    /**
     * @inheritDoc
     */
    public function hasUserPassword(?User $user, string $password): bool
    {
        return $user && Hash::check($password, $user->password);
    }

    /**
     * @inheritDoc
     */
    public function getUser(mixed $fields): ?User
    {
        $user = $this->getUserByEmail($fields['email']);

        return $this->hasUserPassword($user, $fields['password']) ? $user : null;
    }

    /**
     * @inheritDoc
     */
    public function setUserPassword(mixed $fields): bool
    {
        $result = false;
        $user = $this->getUserByEmail($fields['email']);

        if ($user) {
            $result = true;

            $user->update([
                'password' => Hash::make($fields['password'])
            ]);

            $this->logoutUserFromEverywhere($user, $fields);
        }

        return $result;
    }

    /**
     * Получить пользователя по почте
     *
     * @param string $email
     * @return User|null
     */
    private function getUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * @inheritDoc
     */
    public function logoutUserFromEverywhere(User $user, mixed $fields): bool
    {
        $result = false;
        $logoutFromEverywhere = array_key_exists('logout_from_everywhere', $fields)
            && $fields['logout_from_everywhere'];

        if ($user && $logoutFromEverywhere) {
            $result = true;

            $user->update([
                'password' => Hash::make($fields['password'])
            ]);

            $user->tokens()->delete();
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function setUser(mixed $fields): bool
    {
        return auth()->user()->update($fields);
    }
}
