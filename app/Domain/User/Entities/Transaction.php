<?php

namespace App\Domain\User\Entities;

class Transaction
{
    private ?int $id;
    private int $sender_id;
    private int $receiver_id;
    private float $amount;

    public function __construct(?int $id, int $sender_id, int $receiver_id, float $amount)
    {
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->amount = $amount;

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenderId(): int
    {
        return $this->sender_id;
    }

    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }


}
