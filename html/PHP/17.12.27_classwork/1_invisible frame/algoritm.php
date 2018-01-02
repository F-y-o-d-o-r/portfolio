<?php

/*if(isset($_GET[menu])) {
   //switch($_GET[menu]) {
      //case knopki: include_once 'forma.php'; break;
      ////case...
   //}
}*/

if (isset($_POST['auto']) or isset($_POST['zapcasti'])) {
  include_once 'mass_' . key($_POST) . '.php';
  $algoritm = 'algoritm_' . key($_POST); //!!!
  $algoritm(); //!!!
}

function algoritm1()
{
  global $price;
  usort($price, 'func');
}

function algoritm_auto()
{
  global $price;
  usort($price, 'func'); //!!!
  foreach ($price as $k1 => $mas1) {
    $rr = ''; //!!!
    foreach ($mas1 as $k2 => $mas2) {
      //$price[$k1][$k2]='<span style="color:sienna">'.$mas2.'</span>'; //!!!
      $rr = $rr . "<td style='color:sienna'>$mas2</td>"; //!!!
    }
    $rr = "<tr>$rr</tr>"; //!!!
    echo $rr; //!!!
  }
}

function algoritm_zapcasti()
{
  global $price;
  usort($price, 'func'); //!!!
  foreach ($price as $k1 => $mas1) {
    $rr = ''; //!!!
    foreach ($mas1 as $k2 => $mas2) {
      //$price[$k1][$k2]='<span style="color:green">'.$mas2.'</span>'; //!!!
      $rr = $rr . "<td style='color:green'>$mas2</td>"; //!!!
    }
    $rr = "<tr>$rr</tr>"; //!!!
    echo $rr; //!!!
  }
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

if (isset($_FILES['userfile'])) {
  echo "<script>var arr_img = window.parent.content.getElementsByTagName('img');while (arr_img.length) window.parent.content.removeChild(arr_img[0]);</script>";
  $dir = '/programs/servers/openserver/ospanel/domains/classworks/2017.12.27/_index/1_invisible frame/';
  for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
    if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
      //echo $_FILES['userfile']['name'][$i] . '<br>';
      echo "<script>var el_new=window.parent.document.createElement('img');el_new.setAttribute('src','" . $_FILES['userfile']['name'][$i] . "');window.parent.content.appendChild(el_new);</script>";

    } else {
      echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
    }
  }
}
?>