<?php

// https://leetcode.com/problems/longest-substring-without-repeating-characters/

class Solution {

	/**
	 * @param String $str
	 * @return Integer
	 */
	function lengthOfLongestSubstring(string $str) {
		$strLen = strlen($str);
		$memory = [];
		$result = $currentCounter = 0;

		for ($i = 0; $i < $strLen; $i++) {
			if (isset($memory[ $str[$i] ])) {
				if ($currentCounter > $result) {
					$result = $currentCounter;
				}

				foreach ($memory as $char => $flag) {
					unset($memory[ $char ]);
					--$currentCounter;
					if ($char === $str[$i]) {
						break;
					}
				}
			}

			$memory[ $str[$i] ] = true;
			++$currentCounter;
		}

		return $currentCounter > $result ? $currentCounter : $result;
	}

}
