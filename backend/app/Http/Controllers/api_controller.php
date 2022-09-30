<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class api_controller extends Controller
{
    //placeValue take a number
    //return the place value of each digit
    //ex: 39 ➞ [30, 9]
    function placeValue($num=152365){
       
       $result=[];
       $digit=1;

       while ($num!=0){
        
        $reminder=($num % 10)*$digit;
        $num=intval($num/10);
        $digit=$digit*10;
        array_unshift($result,$reminder);

       }

    return $result;

    }

    

}
