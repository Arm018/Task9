<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

interface UserRepository
{
    public function findById(int $id): ?User;

    public function findByEmail(string $email): ?User;

    public function save(User $user): void;

    public function delete(User $user): void;

}
