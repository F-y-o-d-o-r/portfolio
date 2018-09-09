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
$massRows = explode('||', $data);
$scr = "<script>";
foreach ($massRows as $var) {
    $scr .= "var el_tr = document.createElement(\"tr\");var el_td = \"\";";
    $massData = explode('|', $var);
    foreach ($massData as $dat) {
        $scr .= "el_td += '<td>\"" . $dat . "\"</td>';";
    }
    $scr .= "el_tr.innerHTML = el_td;document.getElementById(\"tbody\").appendChild(el_tr);";
}
$scr .= "</script>";
echo $scr;

?>

</body>
</html>
<!--Домашнее задание. Урок №2_1: PHP – строки, массивы.
Данное задание похоже на домашнее задание урока №9 из курса js (формирование контента под таблицей), но обработка значений массивов должна производится в скрипте php, а формирование результирующих DOM-объектов в скриптах js, но внедренных (echo) в скрипт php.
Hа странице создайте таблицу, содержащею 2 tbody :
1-й tbody (заголовки) – 1 строка, 3 столбца («Марка», «Модель», «Цена»);
2-й tbody с идентификатором (содержание) – изначально пустой.
Создайте скрипт PHP, реализующий следующий алгоритм – при загрузке страницы вы должны получить заполненную таблицу со значениями из начальной строки 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100' в виде трех строк и трех столбцов:
(используйте explode, foreach, echo '<scripe>…</script>' + в данном задании (в отличие от последующего) встраивайте js-скрипты вывода данных в DOM прямо в те же блоки кода, где получаете (explode) и перебираете (foreach) массивы данных, полученных из исходной строки)-->


<!--function func_table() {
var el_tbod = document.getElementById("tbod");
var job_arr1 = job.split("||");
for (var i = 0; i < job_arr1.length; i++) {
var el_tr = document.createElement("tr");
var el_td = "";
var job_arr2 = job_arr1[i].split("|");
for (var j = 0; j < job_arr2.length; j++) {
if (job_arr2[j].indexOf('.png') !== -1) {
el_td += "<td><img src='img_job/" + job_arr2[j] + "' alt='' /></td>";
}
else {
el_td += "<td>" + job_arr2[j] + "</td>";
}
}
el_tr.innerHTML = el_td;
el_tbod.appendChild(el_tr);
}
}-->

<!--function func_table() {
var job_arr1 = job.split("||");
for (var i = 0; i < job_arr1.length; i++) {
var el_td = "";
var job_arr2 = job_arr1[i].split("|");
for (var j = 0; j < job_arr2.length; j++) {
if (job_arr2[j].indexOf('.png') !== -1) {
el_td += "<td><img src='img_job/" + job_arr2[j] + "' alt='' /></td>";
}
else {
el_td += "<td>" + job_arr2[j] + "</td>";
}
}
$('#tbod').append('<tr>' + el_td + '</tr>');
}
}-->

<!--function func_table() {
var job_arr1 = job.split("||");
var el_td = "";
for (var i = 0; i < job_arr1.length; i++) {
el_td += "<tr>";
  var job_arr2 = job_arr1[i].split("|");
  for (var j = 0; j < job_arr2.length; j++) {
  if (job_arr2[j].indexOf('.png') !== -1) {
  el_td += "<td><img src='img_job/" + job_arr2[j] + "' alt='' /></td>";
  }
  else {
  el_td += "<td>" + job_arr2[j] + "</td>";
  }
  }
  }
  $("#tbod").html(el_td);
  }-->