<?php
//print_r($_POST);

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

?>