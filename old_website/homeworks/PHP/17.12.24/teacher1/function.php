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
  usort($massData, 'func_sort');
  /************загрузка картинок и пуш их в массив + текущее время в следующий столбик*************/
  if (isset($_FILES)) {
    $dir = "/home/u500387065/public_html/homeworks/PHP/17.12.13";
    //$dir = "/home/forum/www/";
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
  /***********************AJAX сортируем по поисковому запросу и выводим******************/
  if (isset($_POST['search_what']) and !empty($_POST['search_what'])) {
    $varrr = '';
    foreach ($massData as $key => $val40) {
      if (strpos($val40[0], mb_strtoupper($_POST['search_what'])) !== false) {
        foreach ($massData[$key] as $key2 => $val30) {
          if($key2 === 0) {
            $var1 = "<td style='color: red;'>$val30</td>";
          } else $var1 .= "<td style='color: blue;'>$val30</td>";
        }
        $var1 = "<tr>$var1</tr>";
      } else {
        $var2 = '';
        foreach ($massData[$key] as $key22 => $val22) {
          $var2 .= "<td>$val22</td>";
        }
        $varrr .= "<tr>$var2</tr>";
      }
    }
    echo $var1 . $varrr;
    stop_img_change();//останавливаем перебор слайдера при поиске
  } else {
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
  /***********************AJAX сортируем по поисковому запросу и выводим - end******************/
}
/***********************AJAX остановка слайдера при поиске******************/
function stop_img_change() {
  ?>
  <script>
    clearInterval(interv);
  </script>
  <?php
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
/*
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
*/
/***********************change color of the bottons  end******************/
/***********************Вывод нужного блока при нажатии кнопок ЗАГРУЗКА или ПОИСК******************/
/*
if (isset($_POST['show'])) {
  switch ($_POST['show']) {
    case 'download':
      include_once 'form-dowload.php';
      break;
    case 'search':
      include_once 'form-search.php';
      break;
    default:
      include_once 'fon.php';
  }
}
*/
/***********************Вывод нужного блока при нажатии кнопок ЗАГРУЗКА или ПОИСК end******************/