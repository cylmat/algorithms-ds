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
$count = ['valid'=>0, 'warning'=>0, 'alert'=>0];

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
    
    $txt = $dir->getFilename() . END . PHP_EOL;
    // le fichier doit afficher "1" tout a la fin pour être valide
    if (preg_match('/1$/',$printed)) {
        // verifie que l'on a un doccomment au debut de ficher et la function 'assert'
        if (preg_match('/^\/\*\*(.\R?)+assert(.\R?)+/',$file_content)) {
            echo GREEN . $txt;
            @$count['valid']++;
        } else {
            echo ORANGE . $txt;
            @$count['warning']++;
        }
    } else {
        echo RED . $txt;
        @$count['alert']++;
    }
}

//total
$total = $count['alert'] + $count['warning'] + $count['valid'];
if ($count['alert']>0) {
    echo RED . "ERROR";     
} else if ($count['warning']>0) {
    echo ORANGE . "WARNING";     
} else {
    echo GREEN . "OK";     
}
echo ": (" . $count['valid'] . ") valides, (" . $count['warning'] . ") améliorations et " .
     "(" . $count['alert'] . ") erreurs sur un total de (" . $total . ")" . END;