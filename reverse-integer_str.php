<?php

// https://leetcode.com/problems/reverse-integer/

class Solution {

	/**
	 * @param Integer $x
	 * @return Integer
	 */
	function reverse($x): int {
		if ($x === 0) {
			return 0;
		}

		$lim = 2**31;

		if ($x < 0 - $lim || $x > $lim - 1) {
			return 0;
		}

		while (($x % 10) === 0) {
			$x /= 10;
		}

		$str = (string) $x;
		unset($x);
		$strLen = strlen($str);
		$lastIndex = 0;
		$newStr = '';

		if ($str[0] === '-') {
			++$lastIndex;
		}

		for ($i = $strLen - 1; $i >= $lastIndex; --$i) {
			$newStr .= $str[$i];
		}
		
		$newInt = (int) $newStr;
		if (
			((string) $newInt) !== $newStr
			|| $newInt < 0 - $lim
			|| $newInt > $lim - 1
		) {
			return 0;
		}

		if ($str[0] === '-') {
			$newStr = '-' . $newStr;
		}

		return $newStr;
	}

}
