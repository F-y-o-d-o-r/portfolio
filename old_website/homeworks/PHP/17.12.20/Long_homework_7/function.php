<?php
include_once 'array.php';

function tableDOM()
{
  global $search;
  global $data;
  //global $massData;
  /**************«massiv» - формирования двумерного массива****************/
  $massRows = explode('||', $data);//разбили строку на массив
  foreach ($massRows as $ind1 => $val1) {//формируем двумерный массив доразбивая остальную строку
    $massTd = explode('|', $val1);
    foreach ($massTd as $ind2 => $val2) {
      $massData[$ind1][$ind2] = $val2;
    }
  }
  /*************«algoritm0» - сортируем по цене, по возрастанию**************/
  /*  global $sortF;
    $sortF($massData);*/
  usort($massData, 'func_sort');
  /***********«algoritm1» - поиск, выделение, перемещение выделенной строки**********/
  if (isset($_POST['search_what']) and !empty($_POST['search_what'])) {
    foreach ($massData as $key => $val) {
      if (strpos($val[0], mb_strtoupper($_POST['search_what'])) !== false) {
        $massData[$key][0] = '<a href="#" style="color: red;">' . $massData[$key][0] . '</a>';
        foreach ($massData[$key] as $kee => $masss) { //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
          if ($kee != 0) {                                                //!!!(...)!!!ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
            $massData[$key][$kee] = '<span style="color:blue;">' . $massData[$key][$kee] . '</span>';
          }
        }
        $mass = $massData[$key];
        unset($massData[$key]);
        array_splice($massData, 0, 0, array($mass));
      }
    }
  }
  /************загрузка картинок и пуш их в массив + текущее время в следующий столбик*************/
  if (isset($_FILES)) {
    $dir = "/home/u500387065/public_html/homeworks/PHP/17.12.13";
    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
      if (strpos($_FILES['file']['name'][$i], 'jpg') !== false or strpos($_FILES['file']['name'][$i], 'gif') !== false or strpos($_FILES['file']['name'][$i], 'png') !== false) {
        if (copy($_FILES['file']['tmp_name'][$i], $dir . $_FILES['file']['name'][$i])) {
          $name = $_FILES['file']['name'][$i];
          foreach ($massData as $key => $val) {
            foreach ($val as $key2 => $val2) {
              if (mb_strtolower(strip_tags($val2)) == strstr("$name", ".", true)) {
                $massData[$key][] = "<img src=" . $name . "></img>";
                $massData[$key][] = date('d-m-Y H:i:s');
              }
            }
          }
          echo 'succes' . '<br>';
        }
      } else {
        echo 'error';
      }
    }
  }
  /********«DOM» - формируем таблицу из двумерного массива и выводим в DOM***/
  foreach ($massData as $massData_index => $massData_value) {
    $td = '';
    foreach ($massData_value as $index => $massData_value_inside) {
      $td .= '<td>' . $massData_value_inside . '</td>';
    }
    echo '<script>';
    echo 'var tbody=document.getElementById("tbody");';
    echo 'var tr=document.createElement("tr");';
    echo "tr.innerHTML='$td';";
    echo 'tbody.appendChild(tr);';
    echo '</script>';
  }
}

/*********************---Функция сортировки---*******************************/
function func_sort($a, $b)
{
  if ($a[2] > $b[2]) {
    return 1;
  } else if ($a[2] == $b[2]) {
    return 0;
  } else return -1;
}

/************************************************************************/
tableDOM();
/***********************change color of the bottons***********************/
if (isset($_GET['changeColor'])) {
  switch ($_GET['changeColor']) {
    case 'button':
      ?>
      <script>
        document.getElementsByTagName('button')[0].className = 'button2';
        document.getElementsByTagName('button')[1].className = "<?PHP echo $_GET['changeColor'] ?>";
      </script>
      <?PHP
      break;
    case 'button2':
      ?>
      <script>
        document.getElementsByTagName('button')[0].className = "button";
        document.getElementsByTagName('button')[1].className = "<?PHP echo $_GET['changeColor'] ?>";
      </script>
      <?PHP
  }
}





/***********************change color of the bottons  end******************/

/*
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
}*/