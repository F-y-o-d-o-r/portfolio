<?php
foreach ($price as $ke1 => $price1) {
    $rr = '';
    foreach ($price1 as $ke2 => $price2) {
        $rr = $rr . "<li>$price2</li>";
    }
    echo '<script>';
    echo 'var r_tbod=document.getElementById("table");';
    echo 'var r_tr=document.createElement("ul");';
    echo "r_tr.innerHTML='$rr';";
    echo 'r_tbod.appendChild(r_tr);';
    echo '</script>';
}