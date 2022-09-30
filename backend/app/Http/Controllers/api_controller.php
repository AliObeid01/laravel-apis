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

    //evalute take a prefix string expresiion
    //return the evalute ff the expression
    //used for loop in reverse way to iterate through the expression from the end
    //evaluate array to store the result of each operation done and have the last result
    function evaluateExpr($string='+ -10 10'){

        $expr=preg_split('/ /',$string);
        $operators=['+','-','*','/'];
        $evalute=[];
        $result=0;

        for($i = count($expr)-1; $i >= 0; $i--)
        {
           if(!in_array($expr[$i], $operators)){

             array_push($evalute,$expr[$i]);
           }
           else{

                $op2=array_pop($evalute);
                $op1=array_pop($evalute);

                if ($expr[$i] == "*"){
                    $result=$op2*$op1;
                    array_push($evalute,$result);
                }

                elseif($expr[$i] == "/"){
                    $result=$op2/$op1;
                    array_push($evalute,$result);
                }

                elseif($expr[$i] == "+"){
                    $result=$op2+$op1;
                    array_push($evalute,$result);
                }

                else{
                    $result=$op2-$op1;
                    array_push($evalute,$result);
                }

            }              
           }

           return $evalute;
        }

    //binary take a string
    //return the binary string after convert the numbers inside the string to binary format
    //used pregmatch to separate the numbers from char in string
    //used for loop to check if the current string is numbers and convert it to binary then added it to the binary string
    function binary($string='My father was born in 1974.10.25.'){
        
        preg_match_all("/[a-zA-Z\'\/~`\!@#\$%\^&\*\(\)_\-\+=\ {\}\[\]\|;:'\<\>,\.\?\\\]+|\d+/", $string, $match);
        $string_array = $match[0];
        $binary_string='';

        for ($i = 0; $i < count($string_array); $i++){

             if (is_numeric($string_array[$i])){
               $remainder = '';
               while ($string_array[$i]>=1)
               {
                 $remainder .= $string_array[$i] % 2;
                 $string_array[$i] = intval($string_array[$i] / 2);
               }
                  
                $binary_string.=strrev($remainder);
              }
              else{
                  
                $binary_string.=$string_array[$i];
                
              }
               
            }

           return $binary_string;   
        }

    function sortString($string="6jnM31Q"){
      
      $array=str_split($string);
      
      for($i=0;$i<count($array);$i++){

        if (ctype_lower($array[$i])){
           $charlower[]=$array[$i];
        }
        else if (ctype_upper($array[$i])) {
           $charcapital[]=$array[$i];    
         }
        else if (is_numeric($array[$i])) {
           $num[]=$array[$i];    
        }
      }   
    
      $sorted_num=$this->HelperSort($num);
      $char = array_merge($charlower, $charcapital);
      natcasesort($char);
      $sorted_string=array_merge($char,$sorted_num);
      $output=implode("",$sorted_string);
  
    return response()->json([
        "status" => "Sorted",
        "message" => $output
    ]);
}

    function HelperSort($array){

      for($i = 0; $i < count($array); $i ++) {
         for($j = 0; $j < count($array)-1; $j ++){
             if($array[$j]>$array[$j+1]){
                $temp = $array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$temp;   
              }

            }
         }
         return $array;
    }

}