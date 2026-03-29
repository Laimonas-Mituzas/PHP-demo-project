<?php

namespace Core;

class Validator
{
    public static function string($values, $min =1, $max = INF)
    {
        $value = trim($values);
        
        return strlen($value) >= $min && strlen($value) <= $max;
    
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);   
    }
}