<?php

class BankAccount
{
    private int $accountNumber;
    private float $balance;

    public function __construct(int $accountNumber, $balance)
    {
        $this->setAccountNumber($accountNumber);
        $this->setBalance($balance);
    }

    public function setAccountNumber(int $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    //зміни значень властивостей об'єкту
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    //отримання та значень властивостей об'єкту
    public function getBalance(): float
    {
        return $this->balance;
    }

    //поповнення
    public function refill(float $newBalance): void
    {
        $refill = $this->getBalance() + $newBalance;
        $this->setBalance($refill);
    }

    //зняття грошей
    public function withdrawMoney(float $money): void
    {
        if($this->getBalance() < $money) {
            throw new Exception(('<br> There are not enough funds for the operation'));
        }

        $this->setBalance($this->getBalance() - $money);

    }
}