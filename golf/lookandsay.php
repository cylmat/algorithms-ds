<?php 
# https://code.golf/look-and-say#php

$s=1;
foreach(range(0,6)as$r){
  echo$t="$s\n";
  $s='';
  $l=$t[0];
  $n=1;
  for($i=1;$i<strlen($t);$i++) {
    $h=($c=$t[$i])!==$l;
    $h?$s.=$n.$l:0;
    $n=$h?1:$n+1;
    $l=$c;
  }
}
