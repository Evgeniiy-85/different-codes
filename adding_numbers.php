<?php

$sum_test_cases = [
    ['1', '2', '3'],
    ['1', '100', '101'],
    ['0', '0', '0'],
    ['1234567', '1', '1234568'],
    ['9999999', '1', '10000000'],
    // Следующие значения значительно больше, чем Int64
    ['9923372036854775807', '9923372036854775807', '19846744073709551614'],
    ['8547758079923372036', '282076016637471277188', '290623774717394649224'],
    ['716677228283328742446576', '88239450377928284756249776848', '88240167055156568084992223424'],
];


function add($left, $right)
{
	if (gettype($left) !== 'string' || gettype($right) !== 'string') {
		die('Аргументы имеют неправильный тип данных');
	}
	
	$result = '';
	$transfer = 0;
	
	$small_number_rev = strrev($left);
	$big_number_rev = strrev($right);
	
	if (strlen($big_number_rev) < strlen($small_number_rev)) {
		$tmp = $small_number_rev;
		$small_number_rev = $big_number_rev;
		$big_number_rev = $tmp;
	}
	
	for ($i = 0; $i < strlen($big_number_rev); $i++) {
		$summ = (int)$big_number_rev[$i] + (isset($small_number_rev[$i]) ? (int)$small_number_rev[$i] : 0) + $transfer;
		
		if ($summ > 9) {
			$transfer = (int)($summ / 10);
			$summ = (int)($summ % 10);
		} else {
			$transfer = 0;
		}
		
		$result .= $summ;
	}
	
	if ($transfer > 0) {
		$result .= $transfer;
	}
	
	return strrev($result);
}

foreach ($sum_test_cases as $case) {
    list($left, $right, $expected_result) = $case;
    assert(add($left, $right) === $expected_result);
	
	echo add($left, $right) . '<br>';
}





























exit;
