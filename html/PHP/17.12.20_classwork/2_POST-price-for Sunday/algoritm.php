<?php

if (isset($_POST['auto'])) {
    include_once "mass_auto.php";
} else if (isset($_POST['zapcasti'])) {
    include_once "mass_zapcasti.php";
}

function func_sort($a1,$a2) {
    if($a1[2] > $a2[2]) {
        return 1;
    } else if ($a1[2] == $a2[2]) {
        return 0;
    } else return -1;
}

function func_algoritm() {
    global $price;
    usort($price, 'func_sort');
}
/***************************************/
function func_auto(){
    global $price;
    usort($price, 'func_sort');
    foreach ($price as $key => $val) {
        foreach ($val as $key2 => $val2) {
            $price[$key][$key2] = '<span style="color: red;">' . $val2 . '</span>';
        }
    }
}
function func_zapcasti(){
    global $price;
    usort($price, 'func_sort');
    foreach ($price as $key => $val) {
        foreach ($val as $key2 => $val2) {
            $price[$key][$key2] = '<span style="color: blue;">' . $val2 . '</span>';
        }
    }
}
?>