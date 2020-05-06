<?php

define("RED", "\e[31m");
define("GREEN", "\e[32m");
define("ORANGE", "\e[33m");
define("END", "\e[0m");

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('src/algorithms'));

/**
 * Validate all algorithms files
 */
$current_dir=null;
//$count = ['valid'=>0, 'warning'=>0, 'alert'=>0];
$valid = $warning = $alert = 0;

foreach ($dirs as $dir) {

    // affiche les répertoires
    if (0==strpos($dir->getFilename(),'.') && !preg_match('/src|algorithms/', basename($dir->getRealpath()))) {
        if($current_dir != basename($dir->getRealpath())) {
            $current_dir = basename($dir->getRealpath());
            echo ' * ' . ucfirst($current_dir) . ' * ' . PHP_EOL;
        }
    }

    // ne garde que les fichiers
    if(!$dir->isFile() || 'php'!=$dir->getExtension() || basename(__FILE__)===$dir->getFilename()) continue;
    
    // echappe les commentaires
    ob_start();
    include $dir->getRealpath();
    $file_content = preg_replace("/^<\?php\s*\n?\r?/",'',file_get_contents($dir->getRealpath()));
    $printed = ob_get_clean();
    
    $txt = $dir->getFilename();
    $end = END . PHP_EOL;
    // le fichier doit afficher "1" tout a la fin pour être valide
    if (preg_match('/1$/',$printed)) {
        // verifie que l'on a un doccomment au debut de ficher, une reference et la function 'assert'
        $doc = "\/\*\*";
        $ref = ""; //...
        $assert = "assert";
        $sep = "(.\R?)+";
        if (preg_match("/^{$doc}{$sep}{$ref}{$sep}{$assert}{$sep}/",$file_content)) {
            echo GREEN . $txt . $end;
            $valid++;
        } else {
            echo ORANGE . $txt . $end;
            $warning++;
        }
    } else {
        echo RED . $txt . $end;
        $alert++;
    }
}

//total
$total = $alert + $warning + $valid;
if ($alert>0) {
    echo RED . "ERROR";     
} else if ($warning>0) {
    echo ORANGE . "WARNING";     
} else {
    echo GREEN . "OK";     
}
echo ": (" . $valid . ") valides, (" . $warning . ") améliorations et " .
     "(" . $alert . ") erreurs sur un total de (" . $total . ")" . END;