<!--Copyright (c) 2017.12.14. Fyodor Popov. fyodor.work@gmail.com
Created by PhpStorm.
Date: 14.12.2017
Time: 15:10-->
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .submit {
      display: none;
    }
  </style>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file[]" multiple="true" onchange="change()">
  <input type="submit" value="Загрузить картинки" class="submit" name="submit">
</form>
<table>
  <tbody>
  <tr>
    <td style="background-color:silver;">МАРКА</td>
    <td style="background-color:silver;">МОДЕЛЬ</td>
    <td style="background-color:silver;">ЦЕНА</td>
    <td style="background-color:silver;">ВИД</td>
    <td style="background-color:silver;">ДАТА</td>
  </tr>
  </tbody>
  <tbody id="tbody">
  </tbody>
</table>

<?php
$data = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';
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
function func_sort($a, $b)
{
  if ($a[2] > $b[2]) {
    return 1;
  } else if ($a[2] == $b[2]) {
    return 0;
  } else return -1;
}

/***********«algoritm1» - поиск, выделение, перемещение выделенной строки**********/
echo "<hr>";
$search = 'LENOVO';
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
/********«DOM» - формируем таблицу из двумерного массива и выводим в DOM***/
echo '<script>';
foreach ($massData as $massData_index => $massData_value) {
  $td = '';
  foreach ($massData_value as $index => $massData_value_inside) {
    $td .= '<td>' . $massData_value_inside . '</td>';
    $massData_value_inside_array[] = $massData_value_inside;
  }
  echo 'var tbody=document.getElementById("tbody");';
  echo 'var tr=document.createElement("tr");';
  echo "tr.innerHTML='$td';";
  echo 'tbody.appendChild(tr);';
}
echo '</script>';
/******************вставка картинок***********************/
echo '<br>';
//print_r($massData);


?>
<script>
  function change() {
    var upload = document.getElementsByName('submit')[0];
    upload.click();
  }
</script>

</body>
</html>

<!---в начале php–скрипта проинициализируйте еще одну переменную значением строки, например, $search='LENOVO';
-выделите гиперссылкой и цветом текста "red" соответствующий элемент, содержащий значение 'LENOVO' (т.е., условно – ячейка таблицы) + остальные элементы именно данной строки выделите цветом текста "blue":
-соответствующую строку (выделенную) таблицы переместите в начало таблицы:
Все вышеперечисленные действия проведите, используя php, а не js (т.е. – на серверной стороне, а не на клиентской).

C целью дальнейшего использования кода в ООП - модели разделите (условно) его на «составляющие» («блоки»), следующие (и, соответственно, выполняющиеся) один за другим :
а).блок «massiv» - формирования двумерного массива;
б).блок «algoritm0» - пользовательская сортировка;
в).блок «algoritm1» - поиск, выделение, перемещение выделенной строки;
г).блок «DOM» - вывод в DOM.-->

<!--1.Начальная загрузка страницы (присутствует форма загрузки изображений) + шапка таблицы дополнена столбцами «Вид» и «Дата»:
2.При выборе и записи произвольного количества изображений (одно, два или все три, сами изображения могут находиться в произвольном каталоге) они должны записываться в каталог вашего сайта и «приклепляться» к соответствующим записям таблицы (+ дата/время в формате d-m-Y H:i:s):-->