<?php
//!!!ОТКЛЮЧАЕМ ПРЕДУПРЕЖДЕНИЯ
error_reporting(E_ERROR);

include_once 'massiv.php';

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
class Table_mas
{
    //============================= Конструктор-инициализация
    function Table_mas($data)
    {
        $this->data = $data;
    }

    //+++++++++++++++++++++++++++++ Massiv
    function Base_Massiv($dat)
    {
        $this->Massiv($dat);
    }

    //***************************** Algoritm
    function Base_Algoritm($dat, $dat1, $dat2)
    {
        $this->Algoritm($dat, $dat1, $dat2);
    }

    //----------------------------- Dom
    function Base_Dom($dat)
    {
        $this->Dom($dat);
    }
}

//+++++++++++++++++++++++++++++
class Massiv1 extends Table_mas
{
    function Massiv($datt)
    {
        //ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
        $mas1 = explode('||', $datt);
        foreach ($mas1 as $ke => $mass) {
            $mas2 = explode('|', $mass);
            foreach ($mas2 as $kee => $masss) {
                $dat[$ke][$kee] = $masss;
            }
        }
        $this->mas12 = $dat;
    }
}

//****************************
class Algoritm0 extends Table_mas
{
    function Algoritm($dat)
    {
        //НАЧАЛЬНАЯ СОРТИРОВКА - ПО ЦЕНЕ
        usort($dat, array($this, 'func')); //!!! array($this, 'func') !!!//
        $this->mas12 = $dat;
    }

    function func($a1, $a2)
    {
        $a11 = $a1[2]; // СОРТИРОВКА ПО ВТОРОМУ ИНДЕКСУ - ЦЕНЕ
        $a22 = $a2[2];
        if ($a11 > $a22) {
            return 1;
        } else if ($a11 == $a22) {
            return 0;
        } else {
            return 0;
        }
    }
}

//****************************
class Algoritm1 extends Table_mas
{
    function Algoritm($dat, $k, $fon)
    {
        //!!!(...)!!!НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ      //$$$ mb_strtoupper($_POST['param'], 'utf-8') $$$
        foreach ($dat as $ke12_ => $mas12_) {
            if (strpos($mas12_[$k], mb_strtoupper($_POST['param'], 'utf-8')) !== false) { //!!!(...)!!!НАЙТИ ВХОЖДЕНИЕ В "МАРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
                $dat[$ke12_][$k] = "<a href='#' style='font-weight:bold;color:$fon;'>" . $dat[$ke12_][$k] . "</a>"; //!!!(...)!!!ВЫДЕЛИТЬ ПО ВНЕШНЕМУ КЛЮЧУ(СТРОКА) ЭЛЕМЕНТ "0" (УЖЕ БЕЗ array_search)
                //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
                foreach ($dat[$ke12_] as $kee => $masss) {
                    if ($kee != $k) {                                                //!!!(...)!!!ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
                        $dat[$ke12_][$kee] = '<span style="color:blue;">' . $dat[$ke12_][$kee] . '</span>';
                    }
                }
                //ЭЛЕМЕНТ-МАССИВ СЧИТАТЬ В ПЕРЕМЕННУЮ, УДАЛИТЬ ИЗ СТАРОГО МЕСТА И ВСТАВИТЬ В НАЧАЛО
                $mass = $dat[$ke12_];
                unset($dat[$ke12_]);
                array_splice($dat, 0, 0, array($mass));
            } //!!!(...)!!!ЗАКРЫВАЕМ if(strpos...
        } //!!!(...)!!!ЗАКРЫВАЕМ foreach
        $this->mas12 = $dat;
    }
}

//-----------------------------
class Dom1 extends Table_mas
{
    //============================= Конструктор-инициализация
    function Dom1($cvet, $variant)
    {
        $this->cvett = $cvet;
        $this->variantt = $variant;
    }

    function Dom($dat)
    {
        //ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
        foreach ($dat as $ke12_ => $mas12_) {
            $rr = "";
            foreach ($mas12_ as $ke12__ => $mas12__) {
                if ($ke12__ == $this->variantt) {
                    $rr = $rr . "<td style='background-color:$this->cvett;'>$mas12__</td>";
                } else {
                    $rr = $rr . "<td>$mas12__</td>";
                }
            }
            if (isset($_POST['param'])) {
                $rr = "<tr>$rr</tr>";
                echo $rr;
            }
        }
    }
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

$obj1 = new Table_mas($data);             // НАЧАЛЬНАЯ ИНИЦИАЛИЗАЦИЯ КЛАССА - ВХОДНАЯ СТРОКА

$obj00 = new Massiv1();                   // МАССИВ 1 - ИСХОДНЫЙ МАССИВ
$obj00->Base_Massiv($obj1->data);

$obj0 = new Algoritm0();                  // АЛГОРИТМ 0 - НАЧАЛЬНАЯ СОРТИРОВКА
$obj0->Base_Algoritm($obj00->mas12);

if (!empty($_POST['param'])) {           // ВВЕДЕНО ПОИСКОВОЕ ЗНАЧЕНИЕ
    if ($_POST['variant'] == 'marka') {        // ВЫБРАНА "МАРКА" - АЛГОРИТМ 1 - ПОИСК ПО МАРКЕ, ВЫДЕЛЕНИЕ, ПЕРЕМЕЩЕНИЕ
        $obj2 = new Algoritm1();
        $obj2->Base_Algoritm($obj0->mas12, 0, 'red');

        $obj3 = new Dom1('khaki', 0);          // ВЫБРАНА "МАРКА"-DOM 1-СТРОКИ В DOM+Конструктор-инициализация 'khaki'+№ СТОЛБЦА
        $obj3->Base_Dom($obj2->mas12);
    }

    if ($_POST['variant'] == 'model') {        // ВЫБРАНА "МОДЕЛЬ" - АЛГОРИТМ 1 - ПОИСК ПО МОДЕЛИ, ВЫДЕЛЕНИЕ, ПЕРЕМЕЩЕНИЕ
        $obj2 = new Algoritm1();
        $obj2->Base_Algoritm($obj0->mas12, 1, 'green');

        $obj3 = new Dom1('pink', 1);           // ВЫБРАНА "МОДЕЛЬ"-DOM 1-СТРОКИ В DOM+Конструктор-инициализация 'pink'+№ СТОЛБЦА
        $obj3->Base_Dom($obj2->mas12);
    }
} else {                                  // НЕ ВВЕДЕНО ПОИСКОВОЕ ЗНАЧЕНИЕ - АЛГОРИТМ 0!!!
    $obj3 = new Dom1();                    // DOM 1 - СТРОКИ В DOM + БЕЗ!!! Конструктор-инициализация
    $obj3->Base_Dom($obj0->mas12);
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

?>

