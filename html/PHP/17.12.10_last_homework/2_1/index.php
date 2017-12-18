<html>
<head>
    <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
    <style>
        td {
            background-color: whitesmoke;
            border: 1px solid blue;
        }
    </style>
</head>
<body>

<table>
    <tbody>
    <tr>
        <td style="background-color:silver;">МАРКА</td>
        <td style="background-color:silver;">МОДЕЛЬ</td>
        <td style="background-color:silver;">ЦЕНА</td>
    </tr>
    </tbody>
    <tbody id="tbody">
    </tbody>
</table>

<?php

$data = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';

$mas1 = explode('||', $data);

foreach ($mas1 as $ke11 => $mas11) {
    $rr = '';
    $mas2 = explode('|', $mas11);
    foreach ($mas2 as $ke22 => $mas22) {
        $rr = $rr . "<td>$mas22</td>";
    }
    echo '<script>';
    echo 'var r_tbody=document.getElementById("tbody");';
    echo 'var rrr=document.createElement("tr");';
    echo "rrr.innerHTML='$rr';";
    echo 'r_tbody.appendChild(rrr);';
    echo '</script>';
}

?>
</body>
</html>
