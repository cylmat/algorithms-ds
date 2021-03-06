<?php

error_reporting(E_ALL);
ini_set('display_errors','on');

chdir(dirname(__DIR__));

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

require __DIR__.'/../vendor/autoload.php';

function getFileDocComment(string $filename)
{
    $c = htmlentities(file_get_contents($filename));
    $c = preg_replace("#\/\*\*(\n|\r)#",'---START---',$c);
    $c = str_replace(["\n", "\r"],'',$c);
    if(is_string($c)) {
        //preg_match('#\/\*\*(.+)\*\/#', $c, $m);
        preg_match('#---START---(.+)\*\/#', $c, $m);
        
        if(isset($m[1])) {
            $txt = trim($m[1]," *");
            //var_dump($txt);
            return $txt;
        }
    }
    return '';
}

$menu = <<<R
    <a href="/s-algorithms">Algos</a> <a href="/s-datastructure">Datas</a> <a href="/s-designpattern">Patterns</a> <br/><br/>
R;

echo $menu;

Flight::route('/(@ns:.*)', function($ns){

    if(!$ns) return; // home

    // Cherche tous les fichiers php
    $dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/' . str_replace('s-','',$ns)));

    $dirs->rewind();
    $current_dir = null;
    while ($dirs->valid()) {

        // RecursiveIteratorIterator
        if (!$dirs->isDot() && 'index.php' != $dirs->getFilename() && strpos($dirs->getFilename(), 'php')) {
            ob_start();
            $res = include $dirs->getRealpath();
            $c = ob_get_contents();
            ob_end_clean();

            // Display dir
            if($current_dir != $dirs->getSubPath()) {
                echo '<h5>'.$dirs->getSubPath() . '</h5>';
                $current_dir = $dirs->getSubPath();
            }
            //s($res);
            echo true===$res ? '<span style="color:green">' : '<span style="color:red">';
            echo str_replace('.php','',$dirs->getFilename()) . '</span> ';
            echo '<span style="color:blue;font-size:small"><em>' . getFileDocComment($dirs->getRealpath()) . "</em></span>";
            echo $c.'<br/>';
        }
        $dirs->next();
    } 
});

Flight::start();