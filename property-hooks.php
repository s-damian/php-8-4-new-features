<?php

// Property Hooks - PHP 8.4

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

echo '<h3>Street:</h3>';
$addressPhp83->setStreet('34 Sreet ABC');
echo $addressPhp83->getStreet() . '<br>';

echo '<h3>Postal code:</h3>';
$addressPhp83->setPostalCode(38000);
echo $addressPhp83->getPostalCode() . '<br>';

echo '<h3>Full address:</h3>';
echo $addressPhp83->getFullAddress() . '<br>';


echo '<hr>';

/*
|--------------------------------------------------------------------------
| PHP 8.4:
|--------------------------------------------------------------------------
*/

interface AddressPhp84Contract
{
    public int $postalCode { set; }
    public string $fullAddress { get; }
}

class AddressPhp84 implements AddressPhp84Contract
{
    public string $street;

    public int $postalCode {
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

echo '<h3>Street:</h3>';
$addressPhp84->street = '34 Sreet ABC';
echo $addressPhp84->street . '<br>';

echo '<h3>Postal code:</h3>';
$addressPhp84->postalCode = 38000;
echo $addressPhp84->postalCode . '<br>';

echo '<h3>Full address:</h3>';
echo $addressPhp84->fullAddress . '<br>';