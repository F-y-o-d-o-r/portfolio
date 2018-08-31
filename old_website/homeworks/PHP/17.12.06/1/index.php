<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      background-color: #e8ffc3;
    }

    button {
      margin-bottom: 10px;
      margin-top: 10px;
    }

    #div0 {
      margin-bottom: 10px;
    }
    .wrapper {
      max-width: 1000px;
      margin: 20px auto;
    }
  </style>
</head>
<body>
<div class="wrapper">
    <?php
    $a = 5;
    $b = 10;
    echo "<button value='button' onclick='func_size()'>Button</button><br><div id='div0'></div>";
    ?>

  <form name="form1">
    <select name="select1" onchange="locat()">
      <option value="var1">Вариант 1</option>
      <option value="var1">Вариант 2</option>
      <option value="var1">Вариант 3</option>
    </select>
  </form>

  <button id="vetvlenie">Ветвления</button>
</div>
<script>
  function func_size() {
    var var_size = String(<?php echo $a + $b; ?>);
    console.log(typeof var_size);
    var div = document.getElementById('div0');
    div.innerHTML = '<span style="font-size:' + var_size + 'px">Товарищи! рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития. Задача организации, в особенности же сложившаяся структура организации требуют от нас анализа новых предложений. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения направлений прогрессивного развития. С другой стороны укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий. Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание существенных финансовых и административных условий.</span>';
  }
  function locat() {
    var selectedOptionNumber = form1.elements[0].selectedIndex + 1;
    var selectedOptionText = form1.elements[0].options[form1.elements[0].selectedIndex].text;
    console.log(selectedOptionText);
    location.href = 'whatInForm.php?selectedOptionNumber=' + selectedOptionNumber + '&selectedOptionText=' + selectedOptionText;
  }
  vetvlenie.onclick = function one() {
    var chisloDlyaVetvleniya = prompt('Введите число');
    if (isNaN(chisloDlyaVetvleniya)) {
      one();
    } else location.href = 'whatInForm.php?chisloDlyaVetvleniya=' + chisloDlyaVetvleniya;
  }
</script>
</body>
</html>
<!--Домашнее задание. Урок №1: PHP - введение. Установка и конфигурирование Denwer. Общий синтаксис (сравнение с js). Операторы (сравнение с js).  Ветвления, циклы (сравнение с js).

1.На домашнем компьютере (следуя пунктам инструкции) установите Denwer и проверьте корректность работы тестового файла.

2.В рабочем каталоге Denwer cоздайте простой PHP – документ (index.php), в тексте которого разместите скрипты PHP, реализующие следующие алгоритмы :

-(синтаксис php, html и js встроенные в php передача значений переменных из php в js) – в скрипте php определите 2 числовые переменные и присвойте им некоторые значения (например, 5 и 10), в этом же скрипте функцией echo выведите на страницу кнопку типа button (на нее «навесьте» событие onclick, вызывающее некоторую функцию (например, func_size())) и пустой div с некоторым идентификатором (например, div0)); затем, создайте скрипт js, где опишите функцию func_size(), в которой : определите некоторую строковую переменную (например, var_size) и присвойте ей строковый эквивалент суммы значений числовых переменных, определенных в скрипте php; в этой же функции методом innerHTML в блок div, созданный в скрипте php, поместите элемент span с некоторым текстом и атрибутом style со значением font-size:xx, где xx –значение выше определенной переменной razmer (т.е. - сумма значений числовых переменных, определенных в скрипте php);

-(передача значений переменных из js в php) – поставьте на страницу html-форму с элементом select из нескольких пунктов меню option; на сам элемент select «навесьте» событие onchange (выбор пункта меню), при активизации которого вызывается функция, которая вызывает php-скрипт (location.href) и методом get передает ему значение индекса выбранного option+1 (свойство selectedIndex элемента select, «+1» - т.к. значение индекса массива на 1 меньше номера выбранного пункта меню) и текстовое значение выбранного пункта меню (свойство text массива options); php-скрипт принимает и извлекает значения данных двух переданных переменных ($_GET["…"]) и функцией echo выводит их на экран;

-(ветвления, циклы) - задайте значение числовой переменной и, используя простую конструкцию ветвления, определите к какому из двух диапазонов относится введенное число (<=5 или >5) и, используя вложенные в конструкцию ветвления циклы с предусловием (while), при значении переменной меньше или равно 5, сложите все нечетные цифры из диапазона от 1 до заданного числа, а при его значении больше 5 сложите все четные цифры из диапазона от 1 до заданного числа.-->