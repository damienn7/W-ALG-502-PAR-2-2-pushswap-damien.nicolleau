<?php

$la = [2,1,3,6,5,4];
$lb = [];
$to_sort = false;

if (count($la) >= 2) {
    while ($to_sort==false) {
        
        foreach ($la as $key => $value) {
            if ($la[$key]>$la[$key+1]) {
                $interm=$la[$key];
                $la[$key]=$la[$key+1];
                $la[$key+1]=$interm;
            }
            
            if ($la[$key]<=$la[$key+1]||$la[$key]>=$la[$key-1]) {
                $to_sort = true;
            }else{
                $to_sort = false;
            }
        }

        //$to_sort=true;
    }
}

var_dump($la);