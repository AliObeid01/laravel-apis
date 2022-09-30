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
    function evaluateExpr($string='+ 9 * 12 6'){

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
                    $result=$op1*$op2;
                    array_push($evalute,$result);
                }

                elseif($expr[$i] == "/"){
                    $result=$op1/$op2;
                    array_push($evalute,$result);
                }

                elseif($expr[$i] == "+"){
                    $result=$op1+$op2;
                    array_push($evalute,$result);
                }

                else{
                    $result=$op1-$op2;
                    array_push($evalute,$result);
                }

            }              
           }

           return $evalute;
        }
        
    

    
}
