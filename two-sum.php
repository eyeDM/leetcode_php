<?php

// https://leetcode.com/problems/two-sum/

class Solution {

	/**
	 * @param Integer[] $nums
	 * @param Integer $target
	 * @return Integer[]
	 */
	function twoSumBruteForce($nums, $target) {
		$numsLength = count($nums);
		for ($i = 0; $i < $numsLength - 1; $i++) {
			for ($j = $i + 1; $j < $numsLength; $j++) {
				if ($nums[$i] + $nums[$j] === $target) {
					return [$i, $j];
				}
			}
		}
		return [];
	}

	/**
	 * @param Integer[] $nums
	 * @param Integer $target
	 * @return Integer[]
	 */
	function twoSumHashTable($nums, $target) {
		$numMap = [];
		foreach ($nums as $i => $num) {
			$sub = $target - $num;
			if (isset($numMap[$sub])) {
				return [$numMap[$sub], $i];
			}
			$numMap[$num] = $i;
		}
		return [];
	}

}
