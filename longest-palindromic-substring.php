<?php

// https://leetcode.com/problems/longest-palindromic-substring/

class Solution {

	/**
	 * @param string $str
	 * @return string
	 */
	function longestPalindrome(string &$str): string {
		$start = 0;
		$maxLength = 0;
		$strLen = strlen($str);

		for ($i = -1; $i < $strLen; ++$i) {
			// Поиск палиндрома с одним символом в центре
			$left = $i;
			$right = $i;
			while (
				$left >= 0
				&& $right < $strLen
				&& $str[$left] === $str[$right]
			) {
				$currLength = $right - $left + 1;
				if ($currLength > $maxLength) {
					$start = $left;
					$maxLength = $currLength;
				}
				--$left;
				++$right;
			}

			if ($maxLength === $strLen) { break; }

			// Поиск палиндрома с парой символов в центре
			$left = $i;
			$right = $i + 1;
			while (
				$left >= 0
				&& $right < $strLen
				&& $str[$left] === $str[$right]
			) {
				$currLength = $right - $left + 1;
				if ($currLength > $maxLength) {
					$start = $left;
					$maxLength = $currLength;
				}
				--$left;
				++$right;
			}

			if ($maxLength === $strLen) { break; }
		}

		return substr($str, $start, $maxLength);
	}

}
