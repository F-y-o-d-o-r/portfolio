<html>
<head>
  <style>
    td {
      background-color: whitesmoke;
      border: 1px solid blue;
    }
  </style>
</head>
<body>

<form method="post" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
  <input type="file" name="userfile[]" multiple="true">
  <input type="submit" value="Записать">
</form>

<table>
  <tbody>
  <tr>
    <td style="background-color:silver; text-align:center; font-weight:bold;">МАРКА</td>
    <td style="background-color:silver; text-align:center; font-weight:bold;">МОДЕЛЬ</td>
    <td style="background-color:silver; text-align:center; font-weight:bold;">ЦЕНА</td>
    <td style="background-color:silver; text-align:center; font-weight:bold;">ВИД</td>
    <td style="background-color:silver; text-align:center; font-weight:bold;">ДАТА</td>
  </tr>
  </tbody>
  <tbody id="tbody">
  </tbody>
</table>

<?php
//error_reporting(E_ERROR);


if (isset($_FILES['userfile'])) {
  $dir = '/home/forum/www/';
  for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
    if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
      //echo $_FILES['userfile']['name'][$i].'<br>';
    } else {
      echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
    }
  }
}

$data = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';

$sear = 'LENOVO';

$mas1 = explode('||', $data);
foreach ($mas1 as $ke => $mass) {
  $mas2 = explode('|', $mass);
  foreach ($mas2 as $kee => $masss) {
    $mas12[$ke][$kee] = $masss;
  }

  if (isset($_FILES['userfile'])) {
    foreach ($_FILES['userfile']['name'] as $kef => $masf) {
      if (strpos(mb_strtoupper($masf), $mas12[$ke][0]) !== false) {
        $mas12[$ke][] = '<img src="' . $masf . '">';
        $mas12[$ke][] = date('d-m-Y H:i:s');
      }
    }
  }

}

usort($mas12, 'func');
function func($a1, $a2)
{
  $a11 = $a1[2];
  $a22 = $a2[2];
  if ($a11 > $a22) {
    return 1;
  } else if ($a11 == $a22) {
    return 0;
  } else {
    return 0;
  }
}


foreach ($mas12 as $ke12_ => $mas12_) {
  if (in_array($sear, $mas12_)) {
    $pos = array_search($sear, $mas12_);
    $mas12[$ke12_][$pos] = '<a href="#" style="color:red;">' . $sear . '</a>';

    foreach ($mas12[$ke12_] as $kee => $masss) {
      if ($kee != $pos) {
        $mas12[$ke12_][$kee] = '<span style="color:blue;">' . $mas12[$ke12_][$kee] . '</span>';
      }
    }

    $mass = $mas12[$ke12_];
    unset($mas12[$ke12_]);
    array_splice($mas12, 0, 0, array($mass));
    //array_unshift($mas12, $mass); //В ДАННОМ СЛУЧАЕ ВОЗМОЖНО - Т.К.ВСТАВКА В НАЧАЛО

  }
}

foreach ($mas12 as $ke12_ => $mas12_) {
  $rr = "";
  foreach ($mas12_ as $ke12__ => $mas12__) {
    $rr = $rr . "<td>$mas12__</td>";
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
