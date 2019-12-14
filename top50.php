<?php
class Solution
{
    // 反转一个单链表。

    // 示例:

    // 输入: 1->2->3->4->5->NULL
    // 输出: 5->4->3->2->1->NULL
    // 进阶:
    // 你可以迭代或递归地反转链表。你能否用两种方法解决这道题？
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        $pre = NULL;
        $cur = $head;

        while ($cur) {
            $lat = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $lat;
        }
        return $pre;
    }
    // 写一个程序，输出从 1 到 n 数字的字符串表示。

    // 1. 如果 n 是3的倍数，输出“Fizz”；

    // 2. 如果 n 是5的倍数，输出“Buzz”；

    // 3.如果 n 同时是3和5的倍数，输出 “FizzBuzz”。

    /**
     * @param Integer $n
     * @return String[]
     */
    function fizzBuzz($n)
    {
        $str = array();
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $str[] = "FizzBuzz";
            } elseif ($i % 3 == 0) {
                $str[] = "Fizz";
            } elseif ($i % 5 == 0) {
                $str[] = "Buzz";
            } else {
                $str[] = $i . '';
            }
        }
        return $str;
    }

    /**
给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。

说明:

初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
示例:

输入:
nums1 = [1,2,3,0,0,0], m = 3
nums2 = [2,5,6],       n = 3

输出: [1,2,2,3,5,6]
     **/
    /**

     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $end = $m + $n - 1;
        $i = $m - 1;
        $j = $n - 1;
        while ($i >= 0 && $j >= 0) {
            $nums1[$end--] = $nums1[$i] > $nums2[$j] ? $nums1[$i--] : $nums2[$j--];
        }
        while ($i >= 0) {
            $nums1[$end--] = $nums1[$i--];
        }
        while ($j >= 0) {
            $nums1[$end--] = $nums2[$j--];
        }
    }

    /**
 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。

你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。

示例:

给定 nums = [2, 7, 11, 15], target = 9

因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/two-sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
     **/

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $return = array();
        $count = count($nums);
        foreach ($nums as $k1 => $v1) {
            # code...
            for ($i = $k1 + 1; $i < $count; $i++) {
                if ($nums[$k1] + $nums[$i] == $target) {
                    $return[] = $k1;
                    $return[] = $i;
                }
            }
        }
        return $return;
    }

    /**
    给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。

示例 1:

输入: 123
输出: 321
 示例 2:

输入: -123
输出: -321
示例 3:

输入: 120
输出: 21
注意:

假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−231,  231 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reverse-integer
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
     **/

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        if ($x >= 0) {
            $ret = strrev((string) $x);
        } else {
            $ret = -strrev((string) abs($x));
        }
        if ($ret > pow(2, 31) - 1 || $ret < -pow(2, 31)) {
            return 0;
        } else {
            return (int) $ret;
        }
    }

    //罗马数字转整数

    function romanToInt($s)
    {
        // var_dump(substr_replace($s, 'I',1));die();
        $lookup = array(
            'CM' => 900,
            'CD' => 400,
            'XC' => 90,
            'XL' => 40,
            'IX' => 9,
            'IV' => 4,
            'M' => 1000,
            'D' => 500,
            'C' => 100,
            'L' => 50,
            'X' => 10,
            'V' => 5,
            'I' => 1
        );
        $num = 0;
        while ($s != '') {
            foreach ($lookup as $key => $value) {
                $pop = strpos($s, $key);
                if ($pop !== false) {
                    $num = $num + $value;
                    // $s = str_replace($key, '', $s);
                    $s = preg_replace("/" . $key . "/", '', $s, 1);
                }
            }
        }

        return $num;
    }
    /**
给定一个二叉树，找出其最大深度。

二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。

说明: 叶子节点是指没有子节点的节点。

示例：
给定二叉树 [3,9,20,null,null,15,7]，

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/maximum-depth-of-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
     **/
    function maxDepth($pRoot)
    {
        if (null === $pRoot) {
            return 0;
        }
        $depth = 1;
        if (null === $pRoot->left && null === $pRoot->right) {
            return $depth;
        }
        $leftDepth  = $this->maxDepth($pRoot->left);
        $rightDepth = $this->maxDepth($pRoot->right);
        $depth      = ($leftDepth > $rightDepth) ? ($depth + $leftDepth) : ($depth + $rightDepth);
        return $depth;
    }

    /**
     * 编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串 ""。

示例 1:

输入: ["flower","flow","flight"]
输出: "fl"
示例 2:

输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。
说明:

所有输入只包含小写字母 a-z 。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-common-prefix
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
     */

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $q_str = '';
        $re_str = '';
        $row = count($strs);
        if($row == 0){
            return $re_str;
        }
        $column = strlen($strs[0]);
        

        for ($j = 0; $j < $column; $j++) {
            for ($i = 0; $i <$row;  $i++) {
                if (isset($strs[$i][$j])) {
                    if ($i === 0) {
                        $q_str  = $strs[$i][$j];
                    } else {
                        if ($strs[$i][$j] != $q_str) {
                            return $re_str;
                        } else {
                            $q_str = $strs[$i][$j];
                        }
                    }
                }else{
                    return $re_str;
                }
            }
            $re_str = $re_str . $q_str;
        }
        return $re_str;
    }
}

$Solution = new Solution();

// $n=3;
// $return = $Solution->fizzBuzz($n);

// $nums1 = array(1,2,3,4,5,6);
// $nums2 = array(1,2,3);
// $return = $Solution->merge($nums1,6,$nums2,1);

// $return = $Solution->twoSum(array(2, 7, 11, 15),26);

// $return = $Solution->romanToInt('MIII');
// $return = $Solution->maxDepth(array(3, 9, 20, null, null, 15, 7));

// $return = $Solution->longestCommonPrefix(array("flower","flow","flight"));

var_export($return);
