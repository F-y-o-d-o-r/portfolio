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
  echo "<hr>";
//перекрашиваем в цвета разные
  foreach ($massData as $key => $val) {
    foreach ($val as $key2 => $val2) {
      if (in_array($search, $val) and $key2 === 0) {
        array_splice($massData[$key], $key2, 1, '<a href="#" style="color: red;">' . $val2 . '</a>');
      } else if (in_array($search, $val) and $key2 > 0) {
        array_splice($massData[$key], $key2, 1, '<span style="color: blue;">' . $val2 . '</span>');
      }
    }
  }
//переносим вверх строку
  $lenovoLine = $massData[1];
  unset($massData[1]);
  array_unshift($massData, $lenovoLine);
  /************загрузка картинок и пуш их в массив + текущее время в следующий столбик*************/
  if (isset($_FILES)) {
    $dir = "w:/domains/homeworks/2017.12.13/Long_homework_1/";
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
  /********«DOM» - формируем таблицу из двумерного массива и выводим в DOM + проверка на кукки***/
  foreach ($massData as $massData_index => $massData_value) {
    $td = '';
    foreach ($massData_value as $index => $massData_value_inside) {
      if (isset($_COOKIE['firstDownload'])) {
        $td .= '<td>' . $massData_value_inside . '</td>';
      } else {
        $td .= '<li>' . $massData_value_inside . '</li>';
      }
    }
    echo '<script>';
    if (isset($_COOKIE['firstDownload'])) {
      echo 'var tbody=document.getElementById("tbody");';
      echo 'var tr=document.createElement("tr");';
      echo "tr.innerHTML='$td';";
      echo 'tbody.appendChild(tr);';
    } else {
      echo 'var tbody=document.getElementById("one");';
      echo 'var tr=document.createElement("ol");';
    }
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