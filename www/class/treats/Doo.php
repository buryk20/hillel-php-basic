<?php
require_once APP_DIR . '/class/treats/ReturnRes.php';
class Doo
{

    use ReturnRes;

    private $numberA;
    private $numberB;

    public function __construct($numberA, $numberB)
    {
        $this->setNumberA($numberA);
        $this->setNumberB($numberB);
    }

    public function setNumberA(float $numberA)
    {
        if(empty($numberA)){
            throw new Exception("Variable is empty");
        }

        $this->numberA = $numberA;
    }

    public function setNumberB(float $numberB)
    {
        if(empty($numberB)){
            throw new Exception('Variable is empty');
        }

        $this->numberB = $numberB;
    }

    public function multiplication()
    {
        echo $this->retRes() . " " . $this->numberA * $this->numberB;
    }
}