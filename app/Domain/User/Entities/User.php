<?php

namespace App\Domain\User\Entities;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private float $balance;

    public function __construct(int $id, string $name, string $email, float $balance)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->balance = $balance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function addBalance(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Amount must be positive");
        }
        $this->balance += $amount;
    }

    public function subtractBalance(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Amount must be positive");
        }
        if ($amount > $this->balance) {
            throw new \RuntimeException("Insufficient funds");
        }
        $this->balance -= $amount;
    }

}
