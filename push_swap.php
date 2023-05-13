<?php

// ----------------- init.     -----------------

main($argv);

// ----------------- argv      -----------------


function main($argv)
{
    $la = array();
    $lb = array();

    foreach ($argv as $key => $value) {
        if ($key > 0) {
            if (is_numeric($value)) {

                array_push($la, $value);


            }
        }
    }
    $la_sorted = second_sort($la, $lb);

    var_dump($la_sorted);

}

// ----------------- functions -----------------

/**
 * prend le premier element de $lb et le place 
 * a la premiere position de $la
 */
function pa(&$la, &$lb)
{
    // traitement ...

    $first = array_shift($lb);
    array_unshift($la, $first);
    print 'pa ';
}

/**
 * prend le premier element de $la et le place 
 * a la premiere position de $lb
 */
function pb(&$la, &$lb)
{
    // traitement ...
    $first = array_shift($la);
    array_unshift($lb, $first);
    // $lb = array_reverse($lb);
    print 'pb ';
}

/**
 * echange les positions des deux premiers
 * elements
 */
function sa(&$la)
{
    // traitement ...
    $interm = $la[0];
    $la[0] = $la[1];
    $la[1] = $interm;
    print 'sa ';
}

/**
 * echange les positions des deux premiers
 * elements
 */
function sb(&$lb)
{
    // traitement ...
    $interm = $lb[0];
    $lb[0] = $lb[1];
    $lb[1] = $interm;
    print 'sb ';
}

function second_sort(array &$la, array &$lb)
{
    $order = false;
    do {
        if ($la[0] > $la[1]) {
            sa($la);
        }
        for ($i = 0; $i < count($la); $i++) {
            if ($i > 0 && $i + 1 < count($la)) {
                if ($la[$i] > $la[$i + 1]) {
                    for ($j = 0; $j < $i; $j++) {
                        pb($la, $lb);

                    }
                    if ($la[0] > $la[1]) {
                        sa($la);
                    }
                    for ($k = 0; $k < $i; $k++) {
                        pa($la, $lb);
                    }
                }
            }
        }
        if (isOrdered($la, count($la)) == true) {
            $order = true;
        }
    } while ($order == false);
    return [$la, $lb];
}

function isOrdered($table, $len)
{
    // echo $len;
    if (count($table) == $len) {
        for ($i = 0; $i < $len; $i++) {
            if ($i + 1 < $len) {
                if ($table[$i] > $table[$i + 1]) {
                    return false;
                }
            }
        }
        return true;
    } else {
        return false;
    }
}


/**
 * execute sa et sb en meme temps
 */
function sc(&$la, &$lb)
{
    sa($la);
    sb($lb);
    print 'sc ';
}

/**
 * fait une rotation de $la vers le debut
 */
function ra(&$la)
{
    // traitement ...
    print 'ra ';
}

/**
 * fait une rotation de $lb vers le debut
 */
function rb(&$lb)
{
    // traitement ...
    print 'rb ';
}

/**
 * execute ra et rb en meme temps
 */
function rr(&$la, &$lb)
{
    ra($lb);
    rb($lb);
    print 'rr ';
}

/**
 * fait une rotation de $la vers la fin
 */
function rra(&$la)
{
    // traitement ...
    print 'rra ';
}

/**
 * fait une rotation de $lb vers la fin
 */
function rrb(&$lb)
{
    // traitement ...
    print 'rrb ';
}

/**
 * execute rra et rrb en meme temps
 */
function rrr(&$la, &$lb)
{
    rra($la);
    rrb($lb);
    print 'rrr ';
}


// ___________________  NOTES  ___________________

// Input ...
// php push_swap.php 2 1 3 6 5 7 | cat -e

// Output ...
// sa pb pb pb sa pa pa pa$
