<?php

function reduceNumber($number){
    if (($number > 1000) && ($number < 1000000)) {
      $num = (round($number / 1000)) . 'k+';
    }else if($number > 1000000){
      $num = (round($number / 1000000)) .'m+';
    }else{
        $num = $number;
    }
    return $num;
}


?>