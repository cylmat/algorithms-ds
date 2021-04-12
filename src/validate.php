<?php

declare(strict_types=1);

ini_set('display_errors', 'on');
error_reporting(-1);

include 'prepend.php';

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("ORANGE", "\e[33m");
define("END", "\e[0m");

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__.'/Algorithms'));

/**
 * Validate all algorithms files
 */
$current_dir=null;;
$valid = $warning = $alert = 0;

foreach ($dirs as $dir) {

    // display directories
    if (0==strpos($dir->getFilename(),'.') && !preg_match('/src|algorithms/', basename($dir->getRealpath()))) {
        if($current_dir != basename($dir->getRealpath())) {
            $current_dir = basename($dir->getRealpath());
            echo ' * ' . ucfirst($current_dir) . ' * ' . PHP_EOL;
        }
    }

    // only php files
    if(!$dir->isFile() || 'php'!=$dir->getExtension() || basename(__FILE__)===$dir->getFilename()) continue;
    
    // escape comments
    ob_start();
    include $dir->getRealpath();

    $file_content = preg_replace("/^<\?php\s*\n?\r?/",'',file_get_contents($dir->getRealpath()));
    $printed = ob_get_clean();
    
    $txt = $dir->getFilename();
    $end = END . PHP_EOL;
    // file must output "1" to be valid
    if (preg_match('/1$/', $printed)) {
        // verify doccomment in the file, a reference and 1 as output
        $sep = "(.\R?)+";
        $doc = "^\/\*\*";
        $ref = " \* ref(s)?:"; //...
        $todo = "\@todo";
        if (preg_match("/{$doc}/", $file_content) && 
            preg_match("/{$ref}/", $file_content) && 
            !preg_match("/{$todo}/", $file_content)) {
            echo GREEN . $txt . $end;
            $valid++;
        } else {
            echo ORANGE . $txt . $end;
            $warning++;
        }
    } else {
        echo RED . $txt . $printed . "\t (Don't return 1)" . $end;
        $alert++;
    }
}

//total
$total = $alert + $warning + $valid;
if ($alert>0) {
    echo " * Must be a doc comment, a ref and no @todo\n".RED."ERROR";
    exit(2);   
} else if ($warning>0) {
    echo " * Must be a doc comment, a ref and no @todo\n".ORANGE."WARNING";
    exit(1);
} else {
    echo GREEN . "OK";     
}
echo ": (" . $valid . ") valides, (" . $warning . ") améliorations et " .
    "(" . $alert . ") erreurs sur un total de (" . $total . ")" . END . "\n";
