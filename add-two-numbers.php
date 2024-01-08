<?php

// https://leetcode.com/problems/add-two-numbers/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

	/**
	 * @param ListNode $l1
	 * @param ListNode $l2
	 * @return ListNode
	 */
	function addTwoNumbers($l1, $l2) {
		$current = new ListNode();
		$result = $current;

		while (true) {
			$current->val +=
				($l1 === null ? 0 : $l1->val)
				+ ($l2 === null ? 0 : $l2->val);

			if ($current->val > 9) {
				$current->val -= 10;
				$current->next = new ListNode(1);
			}

			if (
				($l1 === null || $l1->next === null)
				&& ($l2 === null || $l2->next === null)
			) {
				break;
			}

			$l1 = ($l1 === null ? null : $l1->next);
			$l2 = ($l2 === null ? null : $l2->next);

			if ($current->next === null) {
				$current->next = new ListNode();
			}
			$current = $current->next;
		}

		return $result;
	}

	/**
	 * @param array $l1
	 * @param array $l2
	 * @return array
	 */
	function addTwoNumbersArrays($l1, $l2) {
		$numCount = max(count($l1), count($l2));
		$result = [];
		$overflow = 0;

		for ($i = 0; $i < $numCount; $i++) {
			$sum = ($l1[$i] ?? 0) + ($l2[$i] ?? 0) + $overflow;
			if ($sum < 10) {
				$result[$i] = $sum;
				$overflow = 0;
			} else {
				$result[$i] = $sum - 10;
				$overflow = 1;
			}
		}

		if ($overflow) {
			$result[] = 1;
		}

		return $result;
	}

}
