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
    .wrapper {
      max-width: 1000px;
      margin: 20px auto;
    }
  </style>
</head>
<body>
<div class="wrapper">
    <?php
    if ($_GET['selectedOptionNumber'] and $_GET['selectedOptionText']) {
        echo "selectedIndex выбранного option: " . $_GET['selectedOptionNumber'] . "<br>";
        echo "text выбранного option: " . $_GET['selectedOptionText'];
    }

    if ($_GET['chisloDlyaVetvleniya']) {
        $chisloDlyaVetvleniya = $_GET['chisloDlyaVetvleniya'];
        $result = 0;
        if ($chisloDlyaVetvleniya <= 5) {
            $i = 1;
            while ($i <= $chisloDlyaVetvleniya) {
                if ($i % 2 != 0) {
                    $result += $i;
                    $i++;
                } else $i++;
            }
            echo "<h4>Сумма нечетных чисел из диапазона от 1 до " . $chisloDlyaVetvleniya . " </h4>" . $result;
        } else if ($chisloDlyaVetvleniya > 5) {
            $i = 1;
            while ($i <= $chisloDlyaVetvleniya) {
                if ($i % 2 == 0) {
                    $result += $i;
                    $i++;
                } else $i++;
            }
            echo "<h4>Сумма четных чисел из диапазона от 1 до " . $chisloDlyaVetvleniya . " </h4>" . $result;
        }
    }
    ?>
</div>
</body>
</html>

<!--(ветвления, циклы) - задайте значение числовой переменной и, используя простую конструкцию ветвления, определите к какому из двух диапазонов относится введенное число (<=5 или >5) и, используя вложенные в конструкцию ветвления циклы с предусловием (while), при значении переменной меньше или равно 5, сложите все нечетные цифры из диапазона от 1 до заданного числа, а при его значении больше 5 сложите все четные цифры из диапазона от 1 до заданного числа.-->