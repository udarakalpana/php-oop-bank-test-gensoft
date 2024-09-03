<?php

namespace Application\Bank;

use InterestCalculator;

require_once 'BankAccount.php';
require_once 'InterestCalculator.php';

class SavingAccount extends BankAccount implements InterestCalculator
{
    private float $interestRate;
    public function __construct(int $accountNumber, float $initialAccountBalance, float $interestRate)
    {
        parent::__construct($accountNumber, $initialAccountBalance);
        $this->interestRate = $interestRate;
    }

    public function calculateInterest(): float
    {
        return $this->getAccountBalance() * $this->interestRate / 100;
    }

    public function generateInterestAndDeposit(): void
    {
        $generatedInterest = $this->calculateInterest();
        $this->deposit($generatedInterest);
        echo "Generated Saving Interest amount $generatedInterest";
    }
}
