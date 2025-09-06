<?php

class Discount
{
    public static function apply(string $code, float $total): float
    {
        if ($code === 'DESCONTO10') {
            return $total * 0.9;
        }
        return $total;
    }
}
