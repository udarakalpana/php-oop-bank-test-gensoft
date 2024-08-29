<?php

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


class SavingAccount extends BankAccount
{
    private float $interestRate;
    public function __construct(int $accountNumber, float $initialAccountBalance, float $interestRate)
    {
        parent::__construct($accountNumber, $initialAccountBalance);
        $this->interestRate = $interestRate;
    }

    public function generateInterestAndDeposit(): void
    {
        $generatedInterest = $this->getAccountBalance() * $this->interestRate / 100;
        $this->deposit($generatedInterest);
        echo "Generated Saving Interest amount $generatedInterest";
    }
}

class FixedDepositAccount extends BankAccount {

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

    public function completeTheYears(): void
    {
        if (!$this->isYearsCompleted) {
            $this->isYearsCompleted = true;
            $generatedInterest = $this->getAccountBalance() * $this->interestRate / 100;
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


$savingAccount1 = new SavingAccount(1234567, 1000, 5);
$savingAccount1->generateInterestAndDeposit();
echo "<br />";
echo "<br />";

$fdAccount1 = new FixedDepositAccount(7654321, 1000, 5, 12);
$fdAccount1->completeTheYears();
echo "<br />";
$fdAccount1->withdrawal(2000);


return response()->json([]);
