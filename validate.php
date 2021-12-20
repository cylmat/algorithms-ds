<?php

ini_set('display_errors', 'on');
error_reporting(-1);

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("END", "\e[0m");

$src = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__.'/src'));

function validates($expect, $value) { echo (int)asserts($expect, $value); }
function asserts($value, $expect): bool { return $value === $expect; }

/**
 * Validate all algorithms files
 */
$current_dir=null;
$valid = $warning = $alert = 0;

foreach ($src as $dir) {
    // display directories
    if (0 == strpos($dir->getFilename(), '.') && !preg_match('/src/', basename($dir->getRealpath()))) {
        if ($current_dir != basename($dir->getRealpath())) {
            $current_dir = basename($dir->getRealpath());
            echo "\n * " . ucfirst($current_dir) . ' * ' . PHP_EOL;
        }
    }

    // only php files
    if ('php' != $dir->getExtension()) {
        continue;
    }
    
    ob_start();
    include $dir->getRealpath();
    $printed = ob_get_clean();

    $txt = $dir->getFilename();
    $end = END . "\t";

    // file must output "1..." to be valid
    if (preg_match('/1+$/', $printed)) {
        echo GREEN . $txt . $end;
    } else {
        echo RED . $txt . ' ' . "\t" . $end;
        exit(1);
    }
}
