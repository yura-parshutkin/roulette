<?php

use PHPUnit\Framework\TestCase;
use Component\Match;
use Component\CoinGenerator;

class CoinGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $n        = 12;
        $m        = 6;
        //Число сочетаний без повторений
        $count    = Match::c($n, $m);
        $variants = (new CoinGenerator())->generate($n, $m);

        $this->assertCount($count, $variants);
    }

    public function testGenerateWithEqualSize()
    {
        $count    = 1;
        $variants = (new CoinGenerator())->generate(12, 12);

        $this->assertCount($count, $variants);
    }
}