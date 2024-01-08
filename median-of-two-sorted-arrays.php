<?php

// https://leetcode.com/problems/median-of-two-sorted-arrays/

class Solution {

	/**
	 * @param Integer[] $nums1
	 * @param Integer[] $nums2
	 * @return Float
	 */
	function findMedianSortedArrays(array $nums1, array $nums2) {
		$nums = array_merge($nums1, $nums2);
		sort($nums);
		$count = count($nums);

		if ($count === 1) {
			return $nums[0];
		}

		$medianIndex = $count / 2;

		if ($count % 2) {
			return $nums[ floor($medianIndex) ];
		} else {
			return ($nums[ $medianIndex - 1 ] + $nums[ $medianIndex ]) / 2;
		}
	}

}
