<?php

require_once 'SavingAccount.php';
require_once 'FixedDepositAccount.php';
require_once 'BankAccount.php';

use Application\Bank\SavingAccount;
use Application\Bank\FixedDepositAccount;


$savingAccount1 = new SavingAccount(1234567, 1000, 5);
$savingAccount1->generateInterestAndDeposit();
echo "<br />";
echo "<br />";

$fdAccount1 = new FixedDepositAccount(7654321, 1000, 5, 12);
$fdAccount1->completeTheYears();
echo "<br />";
$fdAccount1->withdrawal(2000);

