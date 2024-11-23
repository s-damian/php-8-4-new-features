<?php

/**
 * New Without Parentheses - PHP 8.4
 * 
 * @link
 * You can also read the detailed article on my blog:
 * https://www.damian-freelance.com/blog/php-8-4-new-features#new-without-parentheses
 */

class MathPhp
{
    private int $total = 0;

    public function addNumber(int $number): self
    {
        $this->total += $number;

        return $this;
    }

    public function calculate(): int
    {
        return $this->total;
    }
}

/*
|--------------------------------------------------------------------------
| PHP 8.3 (still valid with PHP 8.4):
|--------------------------------------------------------------------------
*/

$total = (new MathPhp())->addNumber(12)->calculate();
echo $total;

// It is also possible to do that:
$total = (new MathPhp)->addNumber(12)->calculate();
echo $total;

/*
|--------------------------------------------------------------------------
| PHP 8.4:
|--------------------------------------------------------------------------
*/

// With PHP 8.4:
$total = new MathPhp()->addNumber(12)->calculate();
echo $total;

// But it is not possible to do that:
//$total = new MathPhp->addNumber(12)->calculate();
//echo $total;
