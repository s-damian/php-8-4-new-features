<?php

/**
 * Property Hooks - PHP 8.4
 * 
 * @link
 * You can also read the detailed article on my blog:
 * https://www.damian-freelance.com/blog/php-8-4-property-hooks
 */

/*
|--------------------------------------------------------------------------
| PHP 8.3:
|--------------------------------------------------------------------------
*/

interface AddressPhp83Contract
{
    public function setStreet(string $value): void;

    public function getStreet(): string;

    public function setPostalCode(int $value): void;

    public function getPostalCode(): int;

    public function getFullAddress(): string;
}

class AddressPhp83 implements AddressPhp83Contract
{
    private string $street;
    private int $postalCode;

    public function setStreet(string $value): void
    {
        $this->street = $value;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setPostalCode(int $value): void
    {
        if (mb_strlen($value) !== 5) {
            throw new \InvalidArgumentException('Must be 5 characters.');
        }
        $this->postalCode = $value;
    }

    public function getPostalCode(): int
    {
        return $this->postalCode;   
    }

    public function getFullAddress(): string
    {
        return $this->street . ' ' . $this->postalCode;
    }
}

$addressPhp83 = new AddressPhp83();

echo 'Street:';
$addressPhp83->setStreet('34 Sreet ABC');
echo $addressPhp83->getStreet();

echo 'Postal code:';
$addressPhp83->setPostalCode(38000);
echo $addressPhp83->getPostalCode();

echo 'Full address:';
echo $addressPhp83->getFullAddress();

/*
|--------------------------------------------------------------------------
| PHP 8.4:
|--------------------------------------------------------------------------
*/

interface AddressPhp84Contract
{
    public int $postalCode { get, set; }
    public string $fullAddress { get; }
}

class AddressPhp84 implements AddressPhp84Contract
{
    public string $street;

    public int $postalCode {
        get => 'POSTAL: ' . $value;
        set {
            if (mb_strlen($value) !== 5) {
                throw new \InvalidArgumentException('Must be 5 characters.');
            }
            $this->postalCode = $value;
        }
    }

    public string $fullAddress {
        get => $this->street . ' ' . $this->postalCode;
    }
}

$addressPhp84 = new AddressPhp84();

echo 'Street:';
$addressPhp84->street = '34 Sreet ABC';
echo $addressPhp84->street;

echo 'Postal code:';
$addressPhp84->postalCode = 38000;
echo $addressPhp84->postalCode;

echo 'Full address:';
echo $addressPhp84->fullAddress;
