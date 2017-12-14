<html>
<head>
<meta http-equiv="Content-Type" content="texthtml; charset=utf-8" /> 
<style>
 td {background-color:whitesmoke; border:1px solid blue;}
</style>
</head>
<body>

<table>
<tbody>
<tr>
<td style="background-color:silver; text-align:center; font-weight:bold;">МАРКА</td>
<td style="background-color:silver; text-align:center; font-weight:bold;">МОДЕЛЬ</td>
<td style="background-color:silver; text-align:center; font-weight:bold;">ЦЕНА</td>
</tr>
</tbody>
<tbody id="tbody">
</tbody>
</table>

<?php

$data='ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';

//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ
$mas1=explode('||', $data);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
}

//ПОЛЬЗОВАТЕЛЬСКА СОРТИРОВКА-ЦЕНА
usort($mas12, 'func'); 
function func($a1, $a2) {
   if($a1[2]>$a2[2]) {return 1;}  // СОРТИРОВКА ПО ВТОРОМУ ИНДЕКСУ - ЦЕНЕ
   else if($a1[2]==$a2[2]) {return 0;}
   else {return -1;}
}

//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
foreach($mas12 as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $rr=$rr."<td>$mas12__</td>"; 
  }
  echo '<script>';
  echo 'var r_tbody=document.getElementById("tbody");';
  echo 'var r_rr=document.createElement("tr");';
  echo "r_rr.innerHTML='$rr';";
  echo 'r_tbody.appendChild(r_rr);';
  echo '</script>';
}

?>

</body>
</html>
