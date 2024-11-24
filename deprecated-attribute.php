<?php

/**
 * Deprecated Attribute - PHP 8.4
 * 
 * Allowed targets: function, method, class constant.
 */

class MathPhp
{
    // Attribute "Deprecated" cannot target property.
    private int $total = 0;

    // Attribute "Deprecated" can target class constant.
    #[\Deprecated]
    public const CLASS_UTILITY = 'Math';

    public function addNumber(int $number): self
    {
        $this->total += $number;

        return $this;
    }

    // Attribute "Deprecated" can target method.
    #[\Deprecated]
    public function calculate(): int
    {
        return $this->total;
    }
}

// With PHP 8.3 we will not see any warning.

// With PHP 8.4 we will see these warnings:

// PHP Deprecated:  Method MathPhp::calculate() is deprecated in...
$total = (new MathPhp())->addNumber(12)->calculate();
echo $total;

// PHP Deprecated:  Constant MathPhp::CLASS_UTILITY is deprecated in...
echo MathPhp::CLASS_UTILITY;
