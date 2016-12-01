<?php

namespace Component;

class CoinGenerator
{
    /**
     * @param int $fieldsCount
     * @param int $chipCount
     * @return array
     */
    public function generate(int $fieldsCount, int $chipCount) :array
    {
        $min = 0;
        for ($i = 0; $i < $chipCount; $i++) {
            $min += pow(2, $i);
        }

        $max = $min << $fieldsCount - $chipCount;
        $variants = [];

        for ($i = $min; $i <= $max; $i++) {
            $bin = decbin($i);
            $sum = substr_count($bin, '1');

            if ($sum === $chipCount) {
                $variants[] = $bin;
            }
        }

        return $variants;
    }
}