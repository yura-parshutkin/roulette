<?php

use PHPUnit\Framework\TestCase;
use Component\Match;
use Component\CoinGenerator;

class CoinGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        //Число сочетаний без повторений
        $count    = Match::c(12, 6);
        $variants = (new CoinGenerator())->generate(12, 6);

        $this->assertCount($count, $variants);
    }

    public function testGenerateWithEqualSize()
    {
        $count    = 1;
        $variants = (new CoinGenerator())->generate(12, 12);

        $this->assertCount($count, $variants);
    }
}