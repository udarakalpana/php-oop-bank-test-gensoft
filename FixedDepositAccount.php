<?php

namespace Application\Bank;

class FixedDepositAccount extends BankAccount implements \InterestCalculator {

    private int $timePeriod;
    private float $interestRate;
    private bool $isYearsCompleted;
    public function __construct(int $accountNumber, float $initialAccountBalance, int $timePeriod, float $interestRate)
    {
        parent::__construct($accountNumber, $initialAccountBalance);
        $this->timePeriod = $timePeriod;
        $this->interestRate = $interestRate;
        $this->isYearsCompleted = false;
    }

    public function calculateInterest(): float
    {
        return $this->getAccountBalance() * $this->interestRate / 100 * $this->timePeriod;
    }

    public function completeTheYears(): void
    {
        if (!$this->isYearsCompleted) {
            $this->isYearsCompleted = true;
            $generatedInterest = $this->calculateInterest();
            $this->deposit($generatedInterest);
            echo "Generated FD Interest amount $generatedInterest";
        }
        else {
            echo "Already years completed";
        }
    }

    public function withdrawal(float $withdrawalAmount): void
    {
        if ($this->isYearsCompleted) {
            parent::withdrawal($withdrawalAmount);
        }
        else {
            echo "Years not completed, cannot withdraw";
        }
    }

}

