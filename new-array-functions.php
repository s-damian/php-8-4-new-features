<?php

/**
 * New Array Functions - PHP 8.4
 */

$arrayA = ['aaa', 'bbbbb', 'ccc', 'ddddd', 'eee'];
$arrayB = ['a' => 'aaa', 'b' => 'bbbbb', 'c' => 'ccc', 'd' => 'ddddd', 'e' => 'eee'];
$arrayC = [111, 222, 333, 444, 555];
$arrayD = [111, 222, 'bbb', 444, 555];

/*
|--------------------------------------------------------------------------
| array_find
| Returns the value of the first element from the array for which the callback returns true.
|--------------------------------------------------------------------------
*/

$test = array_find($arrayA, fn($value, $key) => mb_strlen($value) === 5);
var_dump( $test );
// var_dump result: string(5) "bbbbb"

$test = array_find($arrayB, fn($value, $key) => mb_strlen($value) === 5);
var_dump( $test );
// var_dump result: string(5) "bbbbb"

/*
|--------------------------------------------------------------------------
| array_find_key
| Returns the key of the first element from the array for which the callback returns true.
|--------------------------------------------------------------------------
*/

$test = array_find_key($arrayA, fn($value, $key) => $key === 'b');
var_dump( $test );
// var_dump result: NULL

$test = array_find_key($arrayB, fn($value, $key) => $key === 'b');
var_dump( $test ); // string(1) "b"

/*
|--------------------------------------------------------------------------
| array_all
| Takes an array and a callback, and returns true if all of the elements in the array return true when passed to the callback.
|--------------------------------------------------------------------------
*/

$test = array_all($arrayC, fn($value, $key) => is_numeric($value));
var_dump( $test ); // bool(true)

$test = array_all($arrayD, fn($value, $key) => is_numeric($value));
var_dump( $test ); // bool(false)

/*
|--------------------------------------------------------------------------
| array_any
| Takes an array and a callback, and returns true if any of the elements in the array return true when passed to the callback.
|--------------------------------------------------------------------------
*/

$test = array_any($arrayC, fn($value, $key) => is_numeric($value));
var_dump( $test ); // bool(true)

$test = array_any($arrayD, fn($value, $key) => is_numeric($value));
var_dump( $test ); // bool(true)
