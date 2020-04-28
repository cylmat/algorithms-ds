<?php

function p($var) 
{
    var_dump($var);
}

function dy($i,$msg)
{ 
    $GLOBALS['d'][$i] = $GLOBALS['d'][$i]??''; 
    $GLOBALS['d'][$i] .= $msg;
}