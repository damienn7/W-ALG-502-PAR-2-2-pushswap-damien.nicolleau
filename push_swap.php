<?php

// ----------------- init.     -----------------

$la = array();
$lb = array();

// ----------------- argv      -----------------

foreach ($argv as $key => $value) {
    # code...
}

// ----------------- functions -----------------

/**
 * echange les positions des deux premiers
 * elements
 */
function sa(&$la){
    // traitement ...
}

/**
 * echange les positions des deux premiers
 * elements
 */
function sb(&$lb){
    // traitement ...
}

/**
 * execute sa et sb en meme temps
 */
function sc(&$la,&$lb){
    sa($la);
    sb($lb);
}

/**
 * prend le premier element de $lb et le place 
 * a la fin de $la
 */
function pa(&$lb,&$la){
    // traitement ...
}

/**
 * prend le premier element de $la et le place 
 * a la fin de $lb
 */
function pb(&$la,&$lb){
    // traitement ...
}

/**
 * fait une rotation de $la vers le debut
 */
function ra(&$la){
    // traitement ...
}

/**
 * fait une rotation de $lb vers le debut
 */
function rb(&$lb){
    // traitement ...
}

/**
 * execute ra et rb en meme temps
 */
function rr(&$la,&$lb){
    ra($lb);
    rb($lb);
}

/**
 * fait une rotation de $la vers la fin
 */
function rra(&$la){
    // traitement ...
}

/**
 * fait une rotation de $lb vers la fin
 */
function rrb(&$lb){
    // traitement ...
}

/**
 * execute rra et rrb en meme temps
 */
function rrr(&$la,&$lb){
    rra($la);
    rrb($lb);
}


// ___________________  NOTES  ___________________

// Input ...
// php push_swap.php 2 1 3 6 5 7 | cat -e

// Output ...
// sa pb pb pb sa pa pa pa$





