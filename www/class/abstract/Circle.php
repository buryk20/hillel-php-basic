<?php

require_once APP_DIR . '/class/abstract/Figure.php';
require_once APP_DIR . '/class/abstract/MyConst.php';

class Circle extends Figure implements MyConst
{
    private $radius;

    public function __construct(int $radius)
    {
         $this->setRadius($radius);
    }

    public function setRadius(int $radius): void
    {
        if($radius <= 0 || !is_int($radius)) {
            throw new Exception("<br> Incorrect data radius: $radius");
        }

        $this->radius = $radius;
    }

    public function getRadius(): int
    {
        return $this->radius;
    }

    public function area(): float
    {
        return round($this->getConstantValue() * pow($this->getRadius(), 2), 2);
    }

    public function getArea(): void
    {
        echo $this->area() . '<br>';
    }

    public function perimeter(): float
    {
        return round(2 * $this->getConstantValue() * $this->getRadius(), 2);
    }

    public function getPerimeter(): void
    {
        echo $this->perimeter() . '<br>';
    }

    public function getConstantValue()
    {
        return self::MY_PI;
    }
}