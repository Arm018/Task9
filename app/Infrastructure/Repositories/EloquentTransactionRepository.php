<?php

namespace App\Infrastructure\Repositories;

use App\Domain\User\Entities\Transaction;
use App\Domain\User\Repositories\TransactionRepository;
use App\Models\Transaction as EloquentTransaction;

class EloquentTransactionRepository implements TransactionRepository
{
    public function findById(int $id): ?Transaction
    {
        $eloquentTransaction = EloquentTransaction::findOrFail($id);
        return $this->mapToDomain($eloquentTransaction);
    }

    public function save(Transaction $transaction): Transaction
    {
        $eloquentTransaction = $transaction->getId() ? EloquentTransaction::find($transaction->getId()) : new EloquentTransaction();

        $eloquentTransaction->sender_id = $transaction->getSenderId();
        $eloquentTransaction->receiver_id = $transaction->getReceiverId();
        $eloquentTransaction->amount = $transaction->getAmount();
        $eloquentTransaction->save();

        return $this->mapToDomain($eloquentTransaction);
    }

    public function getAllByUserId(int $userId): array
    {
        $eloquentTransactions = EloquentTransaction::query()
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get();

        return $eloquentTransactions->map(function ($eloquentTransaction) {
            return $this->mapToDomain($eloquentTransaction);
        })->toArray();
    }

    private function mapToDomain(EloquentTransaction $eloquentTransaction): Transaction
    {
        return new Transaction(
            $eloquentTransaction->id,
            $eloquentTransaction->sender_id,
            $eloquentTransaction->receiver_id,
            $eloquentTransaction->amount,
            $eloquentTransaction->created_at
        );
    }
}
