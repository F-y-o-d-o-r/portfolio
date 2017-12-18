<?php

/*echo '<script>';
echo 'var r_tbod=document.getElementById("tbod");';
echo 'var r_tr=document.createElement("tr");';
echo "r_tr.innerHTML='<td>$a</td><td>$b</td><td>$c</td>';";
echo 'r_tbod.appendChild(r_tr);';
echo '</script>';*/

foreach ($price as $ke1 => $price1) {
    $rr = '';
    foreach ($price1 as $ke2 => $price2) {
        $rr = $rr . "<td>$price2</td>";
    }
    echo '<script>';
    echo 'var r_tbod=document.getElementById("tbod");';
    echo 'var r_tr=document.createElement("tr");';
    echo "r_tr.innerHTML='$rr';";
    echo 'r_tbod.appendChild(r_tr);';
    echo '</script>';
}

?>