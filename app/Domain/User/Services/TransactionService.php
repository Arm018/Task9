<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\TransactionRepository;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Entities\Transaction;
use Exception;

class TransactionService
{
    private $transactionRepository;
    private $userRepository;

    public function __construct(TransactionRepository $transactionRepository, UserRepository $userRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
    }

    public function transferMoney(int $senderId, string $receiverEmail, float $amount)
    {
        $sender = $this->userRepository->findById($senderId);
        $receiver = $this->userRepository->findByEmail($receiverEmail);

        if ($sender == null || $receiver == null) {
            throw new Exception('Invalid user ID or email');
        }

        if ($sender->getBalance() < $amount) {
            throw new Exception('Insufficient balance');
        }

        $sender->subtractBalance($amount);
        $receiver->addBalance($amount);

        $this->userRepository->save($sender);
        $this->userRepository->save($receiver);

        $transaction = new Transaction(null, $sender->getId(), $receiver->getId(), $amount);
        $this->transactionRepository->save($transaction);
    }

    public function getTransactionsByUser(int $userId): array
    {
        $transactions = $this->transactionRepository->getAllByUserId($userId);
        foreach ($transactions as $transaction) {
            $transaction->formattedCreatedAt = $transaction->getCreatedAt()
                ? $transaction->getCreatedAt()->format('Y-m-d H:i:s')
                : 'N/A';
        }
        return $transactions;

    }
}
