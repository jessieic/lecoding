<?php

/**
* 会员卡
*
* @author lubj
* @version v1.0
*
*/

 class MemberShipCard 
 {
 	
 	/**
	* 根据上一个会员卡ID，生成新的会员卡id
	*
	* @access public
	* @param string $lastID 上一张会员卡的ID编码
	* @return string $NewCardID 成功返回新的会员卡id,失败返回空字符串
	*/
 	 public function CreateCardID($lastID)
 	{
 		$NewCardID = '';
 		if (!empty($lastID) && is_string($lastID)) {
 			$pattern = "/([0-9]+)$/";//从尾部匹配
	 		$RE= preg_match($pattern, $lastID, $matches);
	 		if($RE){ //匹配成功，全字母无字符串按失败算
	 			$idNum = (int)end($matches);
	 			$cardCode = str_replace($idNum,'', $lastID);
	 			$idNum++;
	 			if ($cardCode) { // 全数字没有字母的结果按失败算
	 				$NewCardID = $cardCode.$idNum;
	 			}
	 		}
 		}
 		return $NewCardID;
 	}
 }



$MemberShipCard = new MemberShipCard();

$testCase= array(
	'123456790',
	'ASDFGGGGJKJ',
	'A1B2C3D5F60009',
	'ABC000db12345658678123',
	'',
	'ADADA'
);

foreach ($testCase as $CardID) {
	var_dump("test CardID:".$CardID);
	$NewCardID = $MemberShipCard->CreateCardID($CardID);
	var_dump("new CardID:".$NewCardID);
	var_dump("-----------------------");
}















?>