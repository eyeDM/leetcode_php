<?php

// https://leetcode.com/problems/reverse-integer/

class Solution {

	private const LIM = 2147483648; // 2**31

	/**
	 * @param Integer $x
	 * @return Integer
	 */
	function reverse($x) {
		if ($x === 0) {
			return 0;
		}

		if ($x > -10 && $x < 10) {
			return $x;
		}

		if ($x < - self::LIM || $x > self::LIM - 1) {
			return 0;
		}

		$isNegative = $x < 0;

		if ($isNegative) {
			$x = abs($x);
		}

		while ($x > 9) {
			$result = $x % 10;
			$x = intdiv($x, 10);
			if ($result !== 0) {
				break;
			}
		}

		while ($x > 9) {
			$result = $result * 10 + $x % 10;
			$x = intdiv($x, 10);
		}
		$result = $result * 10 + $x;

		if ($result > self::LIM - 1) {
			return 0;
		}

		if ($isNegative) {
			$result = 0 - $result;
		}

		return $result;
	}

}
