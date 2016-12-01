<?php

require __DIR__ . '/vendor/autoload.php';

use Component\CoinGenerator;

const MIN_VARIANTS = 10;

$params  = "";
$params .= 'f:'; //число ячеек
$params .= 'c:'; //число монет

$options = getopt($params);

if (!isset($options['f']) or !isset($options['c'])) {
    throw new InvalidArgumentException('There are not enough parameters, you should use "f" and "c" options');
}

betting($options['f'], $options['c']);

/**
 * @param int $fieldsCount
 * @param int $chipCount
 */
function betting(int $fieldsCount, int $chipCount) {
    $generator = new CoinGenerator();
    $variants  = $generator->generate($fieldsCount, $chipCount);
    $file      = new SplFileObject(__DIR__ . '/output.txt', 'w');

    if (count($variants) < MIN_VARIANTS) {
        $file->fwrite(sprintf("менее %d вариантов \n", MIN_VARIANTS));
        return;
    }

    $file->fwrite(count($variants) . "\n");
    foreach ($variants as $variant) {
        $file->fwrite(str_replace(['1','0'], ['$',' '], $variant). "\n");
    }
}