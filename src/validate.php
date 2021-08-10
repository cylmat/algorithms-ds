<?php

declare(strict_types=1);

ini_set('display_errors', 'on');
error_reporting(E_ALL);

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("ORANGE", "\e[33m");
define("END", "\e[0m");

include 'debug.php';

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__.'/Algorithms'));

/**
 * Validate all algorithms files
 */
$current_dir=null;;
$valid = $warning = $alert = 0;

foreach ($dirs as $dir) {
    // display directories
    if (0 == strpos($dir->getFilename(), '.') && !preg_match('/src|lgorithms/', basename($dir->getRealpath()))) {
        if ($current_dir != basename($dir->getRealpath())) {
            $current_dir = basename($dir->getRealpath());
            echo "\n * " . ucfirst($current_dir) . ' * ' . PHP_EOL;
        }
    }

    // only php files
    if (!$dir->isFile() || 'php'!=$dir->getExtension() || basename(__FILE__)===$dir->getFilename()) continue;
    
    // escape comments
    ob_start();
    include $dir->getRealpath();

    $file_content = preg_replace("/^<\?php\s*\n?\r?/", '', file_get_contents($dir->getRealpath()));
    $printed = ob_get_clean();
    
    $txt = $dir->getFilename();
    $end = END . "\t";

    // file must output "1" to be valid
    if (preg_match('/1$/', $printed)) {
        // verify doccomment in the file, a reference and 1 as output
        
        if (ctype_upper($txt[0])) {
            echo GREEN . strtoupper($txt) . $end;
        } else {
            echo GREEN . $txt . $end;
        }
        $valid++;
    } else {
        echo RED . $txt . ' ' . "\t" . $end;
        $alert++;
    }
}

//total
$total = $alert + $warning + $valid;
if ($alert > 0) {
    echo RED."\n\nERROR: ".END." "."";
    $exit = 2;
} else {
    echo GREEN . "\n\nOK: ".END;
    $exit = 0;
}
echo " (" . $valid . ") valides and (" . $alert . ") erreurs on a total of (" . $total . ")" . END . "\n";

if ($exit>0) {
    exit($exit);
}