<?php

include_once 'array.php';  //!!!

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

function tableDOM()
{

  global $data;
//global $sear; //!!!(...)!!!УЖЕ НЕ НУЖНА

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

//!!!(...)!!!ПОЛУЧАЕМ POST ПОИСКА
  if (isset($_POST['param'])) {
//!!!(...)!!!НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
    foreach ($mas12 as $ke12_ => $mas12_) {
      if (strpos($mas12_[0], mb_strtoupper($_POST['param'])) !== false) { //!!!(...)!!!НАЙТИ ВХОЖДЕНИЕ В "МАКРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
        $mas12[$ke12_][0] = '<a href="#" style="color:red;">' . $mas12[$ke12_][0] . '</a>'; //!!!(...)!!!ВЫДЕЛИТЬ ПО ВНЕШНЕМУ КЛЮЧУ(СТРОКА) ЭЛЕМЕНТ "0" (УЖЕ БЕЗ array_search)

        //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
        foreach ($mas12[$ke12_] as $kee => $masss) {
          if ($kee != 0) {                                                //!!!(...)!!!ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
            $mas12[$ke12_][$kee] = '<span style="color:blue;">' . $mas12[$ke12_][$kee] . '</span>';
          }
        }

        //ЭЛЕМЕНТ-МАССИВ СЧИТАТЬ В ПЕРЕМЕННУЮ, УДАЛИТЬ ИЗ СТАРОГО МЕСТА И ВСТАВИТЬ В НАЧАЛО
        $mass = $mas12[$ke12_];
        unset($mas12[$ke12_]);
        array_splice($mas12, 0, 0, array($mass));

      }
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

}

?>
