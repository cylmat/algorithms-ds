<?php

ini_set('display_errors', 'on');
error_reporting(-1);

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("END", "\e[0m");

/**
 * Autoload nodes and data structures classes
 */
spl_autoload_register(function(string $className) {
    include_once __DIR__."/classes/$className.php";
});

function validates($expect, $value) { echo (int)asserts($expect, $value); }
function asserts($value, $expect): bool { return $value === $expect; }
function ob_get() { return trim(ob_get_clean()); }

$valid = $warning = $alert = 0;

/**
 * Include src files
 */
$src = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__.'/src'));

/**
 * Validate all algorithms files
 */
$files = [];
foreach ($src as $file) {
    if ('php' === $file->getExtension()) {
        $files[] = $file;
    }
}
usort($files, function($current, $next) {
    return $current->getRealpath() <=> $next->getRealpath(); 
});

$current = null;
foreach ($files as $file) {
    $base = pathinfo($file->getRealpath(), PATHINFO_DIRNAME);
    if ($base !== $current) {
        echo "\n * ".pathinfo($base, PATHINFO_BASENAME).' : ';
        $current = $base;
    }

    ob_start();
    include $file;
    $printed = ob_get();

    $real = $file->getRealpath();
    $end = END;

    // file must output "1..." to be valid
    if (preg_match('/^1+$/', $printed)) {
        echo GREEN . '1' . $end;
    } else {
        echo $printed.PHP_EOL;
        echo RED . $real . ' ' . "\t" . $end . "\n";
        exit(1);
    }
}
