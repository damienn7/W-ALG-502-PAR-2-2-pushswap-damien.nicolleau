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
            } else {
                echo "    Veuillez saisir des valeurs numeriques !    ";
                return;
            }
        }
    }

    // for ($i=0; $i < 500; $i++) { 
    //     array_push($la, random_int(1,1000));
    // }
    if (count($la)<2) {
        print "\n";
        return;
    }
    $la_sorted = second_sort($la, $lb, min($la), max($la));
    // $la_sorted = first_sort($la, $lb);
    // var_dump($la_sorted);
    print trim($la_sorted)."\n";

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
    $la = array_merge((array) $first, $la);
    return 'pa ';
}

/**
 * prend le premier element de $la et le place 
 * a la premiere position de $lb
 */
function pb(&$la, &$lb)
{
    // traitement ...
    $first = array_shift($la);
    $lb = array_merge((array) $first, $lb);
    return 'pb ';
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
    return 'sa ';
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
    return 'sb ';
}

function second_sort(array &$la, array &$lb, $min, $max)
{
    // rb($lb);
    // ra($la);
    // rrb($lb);

    // rra($la); -> met le dernier en premiere position (ra fait l'inverse)
    $order = false;
    $liste_of_actions = "";
    do {
        if ($la[0] > $la[1]) {
            $liste_of_actions .= sa($la);
        }
        for ($i = 0; $i < count($la); $i++) {
            if ($i > 0 && $i + 1 < count($la)) {
                if ($la[0]>$la[count($la)-1]) {
                    $liste_of_actions .= ra($la);
                }
                if ($la[$i] > $la[$i + 1]) {
                    for ($j = 0; $j < $i; $j++) {
                        $liste_of_actions .= pb($la, $lb);
                    }
                    if ($la[0] > $la[1]) {
                        $liste_of_actions .= sa($la);
                    }
                    for ($k = 0; $k < $i; $k++) {
                        $liste_of_actions .= pa($la, $lb);
                    }
                }
            }
        }
        if (isOrdered($la, count($la)) == true && count($lb) == 0) {
            $order = true;
        }
    } while ($order == false);

    // return ["la" => $la, "lb" => $lb, "min" => $min, "max" => $max];
    return $liste_of_actions;
}

/**
 * execute sa et sb en meme temps
 */
function sc(&$la, &$lb)
{
    sa($la);
    sb($lb);
    return 'sc ';
}

/**
 * fait une rotation de $la vers le debut
 */
function ra(&$la)
{
    // traitement ...
    $first = array_shift($la);
    array_push($la, $first);
    return 'ra ';
}

/**
 * fait une rotation de $lb vers le debut
 */
function rb(&$lb)
{
    // traitement ...
    $first = array_shift($lb);
    array_push($lb, $first);
    return 'rb ';
}

/**
 * execute ra et rb en meme temps
 */
function rr(&$la, &$lb)
{
    ra($lb);
    rb($lb);
    return 'rr ';
}

/**
 * fait une rotation de $la vers la fin
 */
function rra(&$la)
{
    // traitement ...
    $last = array_pop($la);
    // array_unshift($la, $last);
    $la = array_merge((array) $last, $la);
    return 'rra';
}

/**
 * fait une rotation de $lb vers la fin
 */
function rrb(&$lb)
{
    // traitement ...
    $last = array_pop($lb);
    array_unshift($lb, $last);
    return 'rrb ';
}

/**
 * execute rra et rrb en meme temps
 */
function rrr(&$la, &$lb)
{
    rra($la);
    rrb($lb);
    return 'rrr ';
}

function first_sort(array &$la, array &$lb)
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





// ___________________  NOTES  ___________________

// Input ...
// php push_swap.php 2 1 3 6 5 7 | cat -e

// Output ...
// sa pb pb pb sa pa pa pa$
