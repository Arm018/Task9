<?php

namespace App\Infrastructure\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepository
{

    public function findById(int $id): ?User
    {
        $eloquentUser = EloquentUser::findOrFail($id);
        return $eloquentUser ? new User($eloquentUser->id, $eloquentUser->name, $eloquentUser->email, $eloquentUser->balance) : null;

    }

    public function findByEmail(string $email): ?User
    {
        $eloquentUser = EloquentUser::query()->where('email', $email)->first();
        return $eloquentUser ? new User($eloquentUser->id, $eloquentUser->name, $eloquentUser->email, $eloquentUser->balance) : null;
    }

    public function save(User $user): void
    {
        $eloquentUser = EloquentUser::findOrFail($user->getId()) ?: new EloquentUser();
        $eloquentUser->name = $user->getName();
        $eloquentUser->email = $user->getEmail();
        $eloquentUser->balance = $user->getBalance();
        $eloquentUser->save();
    }

    public function delete(User $user): void
    {
        $eloquentUser = EloquentUser::findOrFail($user->getId());
        $eloquentUser->delete();

    }
}
