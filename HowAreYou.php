<?php

/**
 * @uses 根据生日计算年龄，年龄的格式是：2016-09-23
 * @param string $birthday
 * @return string|number
 */
class calcAgeClass
{
    function calcAge($birthday)
    {
        $iage = 0;
        if (!empty($birthday)) {
            $year = date('Y', strtotime($birthday));
            $month = date('m', strtotime($birthday));
            $day = date('d', strtotime($birthday));

            $now_year = date('Y');
            $now_month = date('m');
            $now_day = date('d');

            if ($now_year > $year) {
                $iage = $now_year - $year - 1;
                if ($now_month > $month) {
                    $iage++;
                } else if ($now_month == $month) {
                    if ($now_day >= $day) {
                        $iage++;
                    }
                }
            }
        }
        return $iage;
    }
}

$testData = "1990-11-28";

$calcAgeClass = new calcAgeClass();

$result = $calcAgeClass->calcAge($testData);

var_dump($result);
