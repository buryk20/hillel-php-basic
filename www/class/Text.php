<?php

class Text
{
    protected $text = "some text<br>";

    public function print(): void
    {
        echo ucfirst($this->text);
    }
}

class CapsText extends Text
{
    public function print(): void
    {
        echo strtoupper($this->text);
    }
}