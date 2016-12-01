<?php

namespace Component;

class Match
{
    /**
     * @param int $n
     * @return int
     */
    static function factorial(int $n) :int
    {
        return ($n === 0) ? 1 : $n * self::factorial($n - 1);
    }

    /**
     * Число сочетаний без повторений
     * @param int $n
     * @param int $m
     * @return int
     */
    static function c(int $n, int $m) :int
    {
        return (self::factorial($n) / (self::factorial($m) * self::factorial($n - $m)));
    }
}