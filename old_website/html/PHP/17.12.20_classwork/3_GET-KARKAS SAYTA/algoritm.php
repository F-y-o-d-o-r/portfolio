<?php

if (isset($_POST['auto']) or isset($_POST['zapcasti'])) {
    include_once 'mass_' . key($_POST) . '.php';
}

function algoritm1()
{
    global $price;
    usort($price, 'func');
}

function algoritm_auto()
{
    global $price;
    foreach ($price as $k1 => $mas1) {
        foreach ($mas1 as $k2 => $mas2) {
            $price[$k1][$k2] = '<span style="color:sienna">' . $mas2 . '</span>';
        }
    }
    usort($price, 'func');
}

function algoritm_zapcasti()
{
    global $price;
    foreach ($price as $k1 => $mas1) {
        foreach ($mas1 as $k2 => $mas2) {
            $price[$k1][$k2] = '<span style="color:green">' . $mas2 . '</span>';
        }
    }
    usort($price, 'func');
}

function func($a1, $a2)
{
    $a11 = $a1[2];
    $a22 = $a2[2];
    if ($a11 > $a22) {
        return 1;
    } else if ($a11 == $a22) {
        return 0;
    } else {
        return -1;
    }
}

?>