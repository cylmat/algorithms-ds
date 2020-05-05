<?php

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("END", "\e[0m");

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('src/algorithms'));

/**
 * Validate all algorithms files
 */
$current_dir=null;
foreach($dirs as $dir) {

    if (0==strpos($dir->getFilename(),'.') && !preg_match('/src|algorithms/', basename($dir->getRealpath()))) {
        if($current_dir != basename($dir->getRealpath())) {
            $current_dir = basename($dir->getRealpath());
            echo ' * ' . ucfirst($current_dir) . ' * ' . PHP_EOL;
        }
    }

    if(!$dir->isFile() || basename(__FILE__)===$dir->getFilename()) continue;
    
    ob_start();
    include $dir->getRealpath();
    $content = ob_get_clean();
    
    if(preg_match('/1$/',$content)) {
        echo GREEN . $dir->getFilename() . END . PHP_EOL;
    } else {
        echo RED . $dir->getFilename() . END . PHP_EOL;
    }
}