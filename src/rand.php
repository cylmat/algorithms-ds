<?php

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('src/algorithms'));
$res = [];

foreach ($dirs as $dir) {
    if(!$dir->isFile() || 'php'!=$dir->getExtension() || basename(__FILE__)===$dir->getFilename()) continue;
    $res[] = str_replace('.php','',$dir->getFilename());
}

shuffle($res);
echo " try => \e[32m".$res[0]."\e[0m";