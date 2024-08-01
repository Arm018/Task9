<?php

namespace App\Infrastructure\Repositories;

use App\Domain\User\Entities\Transaction;
use App\Domain\User\Repositories\TransactionRepository;
use App\Models\Transaction as EloquentTransaction;

class EloquentTransactionRepository implements TransactionRepository
{

    public function findById(int $id): ?Transaction
    {
        $eloquentTransaction = EloquentTransaction::findOrFail($id) ?: new EloquentTransaction();
        return $eloquentTransaction;
    }

    public function save(Transaction $transaction): Transaction
    {
        // TODO: Implement save() method.
    }

    public function getAllByUserId(int $userId): array
    {
        // TODO: Implement getAllByUserId() method.
    }
}
