<?php

namespace App\Domain\User\Entities;

class Transaction
{
    private ?int $id;
    private int $sender_id;
    private int $receiver_id;
    private float $amount;
    private ?\DateTime $created_at;

    public function __construct(?int $id, int $sender_id, int $receiver_id, float $amount, ?\DateTime $created_at = null)
    {
        $this->id = $id;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->amount = $amount;
        $this->created_at = $created_at;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }


}
