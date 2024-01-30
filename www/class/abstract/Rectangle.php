<?php

require_once APP_DIR . '/class/abstract/Figure.php';

class Rectangle extends Figure
{
    private int $length;
    private int $width;

    public function __construct(int $length, int $width)
    {
        $this->setLength($length);
        $this->setWidth($width);
    }

    public function area(): int
    {
        return $this->getWidth() * $this->getLength();
    }

    public function getArea(): void
    {
        echo $this->area();
    }

    public function perimeter(): int
    {
        return $this->getWidth() + $this->getLength();
    }

    public function getPerimeter(): void
    {
        echo $this->perimeter();
    }

    public function setLength(int $length): void
    {
        if($length <= 0 || !is_int($length)) {
            throw new Exception("<br> Incorrect data length: $length");
        }
        $this->length = $length;
    }

    public function setWidth(int $width): void
    {
        if($width <= 0 || !is_int($width)) {
            throw new Exception("<br> Incorrect data width: $width");
        }
        $this->width = $width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getWidth(): int
    {
        return $this->width;
    }
}