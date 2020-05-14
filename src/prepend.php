<?php

function d($v){ var_dump($v); }
function dd($v){ d($v); die(); }

/*
 2d or 3d matrix
 */
function display_3d_matrix(array $arr) {
    foreach($arr as $a) {
        display_2d_matrix($a);
    }
}

function display_2d_matrix(array $arr)
{
    $SEP = '|'; $s=4;
    echo str_pad('',$s,' ').$SEP;
    foreach($arr as $i => $val_i) {
        foreach($arr[$i] as $j => $val_j) {
            echo str_pad($j,$s,' ').$SEP;
        }
        break;
    }
    echo "\n";
    
    foreach($arr as $i => $val_i) {
        echo str_pad($i,$s,' ').$SEP;
        foreach($arr[$i] as $j => $val_j) {
            echo str_pad($val_j,$s,' ').$SEP;
        }
        echo "\n";
    }
    echo "\n";
}

if(!class_exists('node')) {
class node { 
    public $val, $childs=[]; 
    function __construct($v=null) { $this->val=$v; } 
    function add($v) { $n = new node($v); $this->childs[] = $n; return $n; }
}
}

function display_tree(node $node, $d=0)
{
    echo str_pad('',$d*2,' .') . ' ' . $node->val."\n";
    foreach ($node->childs as $child) display_tree($child, $d+1);
}