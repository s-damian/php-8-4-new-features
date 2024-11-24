<?php

/**
 * Asymmetric Visibility - PHP 8.4
 */

class AddressVisible
{
    public private(set) string $street = 'Street A';
}

$addressVisible = new AddressVisible();
echo $addressVisible->street;

// Street APHP Fatal error: "Uncaught Error: Cannot modify private(set) property AddressVisible::$street from global scope in"
//echo $addressVisible->street = 'Street A2';
