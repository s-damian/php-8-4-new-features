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
| PHP 8.4:
|--------------------------------------------------------------------------
*/

interface AddressPhp84Contract
{
    //public string $street; // Not allowed: Interfaces may only include hooked properties
    public int $postalCode { set; }
    public string $city { get; set; }
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

    public string $city {
        get => $this->city . ' city';
        set {
            if (!is_string($value)) {
                throw new \InvalidArgumentException('Must be string.');
            }
            $this->city = $value;
        }
    }

    public string $fullAddress {
        get => $this->street . ', ' . $this->postalCode . ', ' . $this->city;
    }
}

$addressPhp84 = new AddressPhp84();

echo 'Street:';
$addressPhp84->street = '34 Sreet ABC';
echo $addressPhp84->street;

echo 'Postal code:';
$addressPhp84->postalCode = 38000;
echo $addressPhp84->postalCode;

echo 'City:';
$addressPhp84->city = 'Tallinn';
echo $addressPhp84->city;

echo 'Full address:';
echo $addressPhp84->fullAddress;

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

    public function setCity(string $value): void;

    public function getCity(): string;

    public function getFullAddress(): string;
}

class AddressPhp83 implements AddressPhp83Contract
{
    private string $street;
    private int $postalCode;
    private string $city;

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



    public function setCity(string $value): void
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Must be string.');
        }
        $this->city = $value;
    }

    public function getCity(): string
    {
        return $this->city;   
    }



    public function getFullAddress(): string
    {
        return $this->street . ', ' . $this->postalCode . ', ' . $this->city;
    }
}

$addressPhp83 = new AddressPhp83();

echo 'Street:';
$addressPhp83->setStreet('34 Sreet ABC');
echo $addressPhp83->getStreet();

echo 'Postal code:';
$addressPhp83->setPostalCode(38000);
echo $addressPhp83->getPostalCode();

echo 'City:';
$addressPhp83->setCity('Tallinn');
echo $addressPhp83->getCity();

echo 'Full address:';
echo $addressPhp83->getFullAddress();
