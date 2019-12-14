<?php


// class Solution:
//     def _partition(self, s, index, t, result):
//         if index == len(s):
//             result.append(t.copy())
//             return 

//         for i in range(index+1, len(s)+1):
//             if s[index:i] == s[index:i][::-1]:
//                 t.append(s[index:i])
//                 self._partition(s, i, t, result)
//                 t.pop()
        
//     def partition(self, s):
//         """
//         :type s: str
//         :rtype: List[List[str]]
//         """
//         result = list()
//         if not s:
//             return result
        
//         self._partition(s, 0, list(), result)
//         return result


class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    public $result ;


    function isPalindrome($s) {
        if(empty($s)){
            return $this->result;
        }
        $this->partition($s,0,array(),$this->result);
        return $this->result;
    }

    function partition($s,$index,$t,$result){
    	if ($index == strlen($s)) {
            $this->result[]= $t;
            return ;
        }

        for ($i=$index+1; $i<=strlen($s)+1 ; $i++) {
            $chuang = substr($s,$index,$i-$index);
            var_dump($chuang);
            if($this->isPalind($chuang)){
                $t[] = $chuang;
                $this->partition($s,$i,$t,$result);
                
            }
        }

    }


     function isPalind($s){
     	$srev = strrev($s);
     	if ($srev == $s) {
     		return true;
     	}else{
			return false;
     	}
    }
}

$Solution = new Solution();

$input = 'aab';

// var_dump(substr('abc', 0,1));die;

$re = $Solution->isPalindrome($input);

var_dump($re);


?>