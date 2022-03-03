<?php

class StringCalculatorTest extends \PHPUnit\Framework\TestCase {

    # Validate Empty String Test
    public function test_handle_empty_string(){
        $string = "";
        $get_method = new App\StringCalculator;
        $result = $get_method->Add($string);
        $this->assertEquals(0, $result);
    }

    # Validate Negative Number Test
    public function test_handle_negative_number(){
        $string = "-1, 3, -5";
        $get_method = new App\StringCalculator;
        $result = $get_method->Add($string);
        $this->assertEquals("negatives not allowed : -1,-5", $result);
    }

    # Validate Input
    public function test_input_validation(){
        $string = "2\n1,3,5,2\n6,9\n,8,9";
        $get_method = new App\StringCalculator;
        $result = $get_method->Add($string);
        $this->assertEquals("Sum : 45", $result);
    }
    
    # Validate New Delimiter
    public function test_new_delimiter(){
        $string = "//;4\n1,3,5,2\n6,9\n,8,9";
        $get_method = new App\StringCalculator;
        $result = $get_method->Add($string);
        $this->assertEquals("Sum : 47", $result);
    }
}