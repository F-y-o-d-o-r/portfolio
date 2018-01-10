<?php

error_reporting(E_ERROR);

include_once 'massiv.php';

class Table_mass
{
    public $dat;//не обязательно
    //public $res;
    static public $resa;//static статическое свойство

//присвоим массив внутри класса
    function __construct($datt)//обязательно __construct имя - конструктор, принимает переданный снаружи параметр
    {
        $this->dat = $datt;
    }
    //function __destruct()
    //{
    // что-то после заканчивания скрипта произойдет
    //}
// 1. ####################################################################################
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
    private function Massiv()//private только из внутри класса, паблик везде
    {
        $mas1 = explode('||', $this->dat);
        foreach ($mas1 as $ke => $mass) {
            $mas2 = explode('|', $mass);
            foreach ($mas2 as $kee => $masss) {
                $mas12[$ke][$kee] = $masss;
            }
        }
//print_r($mas12);
//return $mas12;
//$this->res = $mas12;
        self::$resa = $mas12;
    }

    //метод для вызова приватного метода
    function Massive_public()
    {
        $this->Massiv();
    }
// 1. ####################################################################################

// 2. ####################################################################################
//СОРТИРОВКА-ЦЕНА
    function Algoritm0()
    {
        //sort($this->res);
        usort(self::$resa, array($this, 'func_sort'));
    }

    function func_sort($a1, $a2)
    {
        if ($a1[2] > $a2[2]) {
            return 1;
        } else if ($a1[2] == $a2[2]) {
            return 0;
        } else {
            return 0;
        }
    }

// 2. ####################################################################################

// 3. ####################################################################################
//ПОЛУЧАЕМ POST ПОИСКА
    function Algoritm1()
    {
        $mas12 = self::$resa;//or change $mass12
        if (isset($_POST['param'])) {
//НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ         
            foreach ($mas12 as $ke12_ => $mas12_) {
                if (strpos($mas12_[0], mb_strtoupper($_POST['param'], 'utf-8')) !== false) {
                    $mas12[$ke12_][0] = '<a href="#" style="color:' . $this->color1 . ';">' . $mas12[$ke12_][0] . '</a>';
                    //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
                    foreach ($mas12[$ke12_] as $kee => $masss) {
                        if ($kee != 0) {
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
        //$this->res = $mas12;//выбросим в класс
        self::$resa = $mas12;

        //$this->Algoritm0();
    }

// 3. ####################################################################################

// 4. ####################################################################################
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
    function Dom()
    {
        foreach (self::$resa as $ke12_ => $mas12_) {
            $rr = "";
            foreach ($mas12_ as $ke12__ => $mas12__) {
                $st = "background-color:$this->color;color:$this->font;";//!
                $rr = $rr . "<td style=$st>$mas12__</td>";
            }
            if (isset($_POST['param'])) {
                $rr = "<tr>$rr</tr>";
                echo $rr;
            } else {
                echo '<script>';
                echo 'var r_tbody=document.getElementById("tbody");';
                echo 'var r_rr=document.createElement("tr");';
                echo "r_rr.innerHTML='$rr';";
                echo 'r_tbody.appendChild(r_rr);';
                echo '</script>';
            }
        }
    }

    // 5. ####################################################################################
//статический метод

    static function Dom_static($arr)//вызвали метод без создания объекта - метод статик
    {
        foreach ($arr as $ke12_ => $mas12_) {
            $rr = "";
            foreach ($mas12_ as $ke12__ => $mas12__) {
                //$st = "background-color:$this->color;color:$this->font;";//!
                $rr = $rr . "<td>$mas12__</td>";
            }
            if (isset($_POST['param'])) {
                $rr = "<tr>$rr</tr>";
                echo $rr;
            } else {
                echo '<script>';
                echo 'var r_tbody=document.getElementById("tbody");';
                echo 'var r_rr=document.createElement("tr");';
                echo "r_rr.innerHTML='$rr';";
                echo 'r_tbody.appendChild(r_rr);';
                echo '</script>';
            }
        }
    }
// 4. ####################################################################################
}

class Table_fon extends Table_mass
{//наследует
    function Fon($col, $font)
    {
        //$this->res = $ress;
        $this->color = $col;
        $this->font = $font;
        $this->Dom();//вызываем
    }
}

class Algoritm_cvet extends Table_mass
{
    function Cvet($col1)
    {
        //$this->res = $varr;
        $this->color1 = $col1;
        $this->Algoritm1();
    }
}


//////////////////////////////
abstract class Db//можно раздавать внутринние абстрактные функции
{
    abstract function open();

    function close()
    {
        echo 'close<br>';
    }
}

//$obj_db = new Db();-нельзя
class Db_my extends Db
{
    function open()//перегрузить нужно (){}; хоть пустые
    {
        echo 'open<br>';
    }
}

$obj_db = new Db_my();
$obj_db->close();
$obj_db->open();

////////////
interface Db_in
{//class too, все методы внутри интерфейса - абстрактные - те без реализации
    function open_int();
}

class Db_my_int implements Db_in
{
    function open_int()
    {
        // перегрузить нужно (){}; хоть пустые
    }
}

$obj_int = new Db_my_int();
///////


$obj = new Table_mass($data);
//$obj->dat = $data;
//$obj->res = $obj->Massiv();
//$obj->Massiv();
$obj->Massive_public();
$obj->Algoritm0();
$obj_alg = new Algoritm_cvet();
$obj_alg->Cvet('gold');
//$obj->Algoritm1();
//$obj->Dom();
$obj_dom = new Table_fon();
$obj_dom->Fon('red', '#fff');

unset($obj);
//$obj->Massiv();

Table_mass::Dom_static(array(array(1, 2, 3)));//вызвали метод без создания объекта - метод статик

//ооп
//наследование
//инкапсуляция-разделение прав разработчиков - $obj->Massive_public();
//полиморфизм-далее


//абстрактный класс от интерфейса чем отличается - собеседования
//1-нельзя напрямую создать класс
// интерфесе не может быть методов с реализацией - только абстрактные
//не надо писать абстракт
//в абстрактном как обстрактные так и реализованные,
//екстендс не поддерживает множественное наследование только интерфейс


?>