<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
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
$massRows = explode('||', $data);//разбили строку на массив
foreach ($massRows as $ind1 => $val1) {//формируем двумерный массив доразбивая остальную строку
    $massTd = explode('|', $val1);
    foreach ($massTd as $ind2 => $val2) {
        $massData[$ind1][$ind2] = $val2;
    }
}

/************************************************************************/
//сортируем по цене, по возрастанию
usort($massData, 'func_sort');
function func_sort($a, $b)
{
    if ($a[2] > $b[2]) {
        return 1;
    } else if ($a[2] == $b[2]) {
        return 0;
    } else return -1;
}

//print_r($massData);
/************************************************************************/

echo '<script>';//формируем таблицу из двумерного массива
foreach ($massData as $massData_index => $massData_value) {
    $td = '';
    foreach ($massData_value as $index => $massData_value_inside) {
        $td .= "<td>$massData_value_inside</td>";
        $massData_value_inside_array[] = $massData_value_inside;
    }
    echo 'var tbody=document.getElementById("tbody");';
    echo 'var tr=document.createElement("tr");';
    echo "tr.innerHTML='$td';";
    echo 'tbody.appendChild(tr);';
}
echo '</script>';

//echo "<hr>";
/*$data_arr = array('thing1' => array('ACER', 'ES1', 5500), 'thing2' => array('LENOVO', 'G50', 4500), 'thing3' => array('HP', 'G3', 6500),);
$data_std = (object)$data_arr;
print_r($data_std);
echo '<hr>';
foreach ($data_std as $k1 => $val1) {
    foreach ($val1 as $k2 => $va2) {
        $massData[$k1][$k2] = $va2;
    }
}
echo '<br>';
print_r($massData);*/
?>

</body>
</html>
<!--Создайте скрипт PHP, реализующий следующие алгоритмы :
1.Разделите (перепишите) код первого дз на две части :
+формирование двумерного массива из исходной строки;
+вывод в DOM в таком же виде, как это было в первом дз, но уже используя ранее сформированный двумерный массив (результат должен быть аналогичный выполнению домашнего задания урока №2-1):
-2.Используя необходимую функцию, дополните алгоритм таким образом, чтобы данные в DOM были выведены отсортированными по возрастанию цены-->