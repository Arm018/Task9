<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\Transaction;

interface TransactionRepository
{
    public function findById(int $id): ?Transaction;

    public function save(Transaction $transaction): Transaction;

    public function getAllByUserId(int $userId): array;

}
