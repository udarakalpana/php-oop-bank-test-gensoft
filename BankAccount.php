<?php

namespace Application\Bank;

class BankAccount
{
    public int $accountNumber;
    private float $balance;
    public function __construct(int $accountNumber, float $initialAccountBalance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialAccountBalance;
    }

    public function deposit(float $depositAmount): void
    {
        $this->balance += $depositAmount;
        echo $this->balance;
        echo "<br />";
    }

    public function withdrawal(float $withdrawalAmount): void
    {
        if ($withdrawalAmount > $this->balance) {
            echo "Balance is not enough";
        }
        else {
            $this->balance -= $withdrawalAmount;
            echo $this->balance;
            echo "<br />";
        }
    }

    public function getAccountBalance(): float
    {
        return $this->balance;
    }
}