<?php

namespace App;

class StringCalculator {
    
    public function add($string) {

        # Check for empty string
        if(empty($string)){
            return 0; 
        }

        # Check negative number
        if(!empty($string)){
            preg_match_all('!-\d+!', $string, $matches);
            if(count($matches[0]) > 0){
                $negative = implode(',', $matches[0]);
                return "negatives not allowed : ".$negative;
            }
        }

        # Check input format "\n" & new delimiter support
        if(!empty($string)){
            $position = strpos($string, "//", 0);
            $delimiter_count = substr_count($string, "//");
            if($position != 0 || $delimiter_count > 1){
                return "Input is NOT Ok";
            }else{
                $regex = '/[^0-9\\\\n]+[\\\\]+[n]/mi';
                $new_string=  str_replace("\n", "\\n", $string, $count);
                preg_match_all($regex, $new_string, $matches, PREG_SET_ORDER, 0);
                if(count($matches) > 0){
                    return "Input is NOT Ok";
                }
            }
        }
        
        # Sum Input
        preg_match_all('!\d+!', $string, $matches);
        $sum  = array_sum($matches[0]);
        return "Sum : ".$sum;
    }
}
$x = new StringCalculator();
$p = $x->add("2\n1,3,5,2\n6,9\n,8,9");
print($p);
?>