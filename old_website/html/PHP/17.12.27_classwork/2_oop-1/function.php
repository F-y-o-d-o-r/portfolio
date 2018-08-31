<?php

error_reporting(E_ERROR);

include_once 'massiv.php';

class Table_mass
{
  public $dat;//не обязательно
  //public $res;
// 1. ####################################################################################
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
  function Massiv()
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
    $this->res = $mas12;
  }
// 1. ####################################################################################

// 2. ####################################################################################
//СОРТИРОВКА-ЦЕНА
  function Algoritm0()
  {
    //sort($this->res);
    usort($this->res, array($this, 'func_sort'));
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
    $mas12 = $this->res;//or change $mass12
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
    $this->res = $mas12;//выбросим в класс
    //$this->Algoritm0();
  }
// 3. ####################################################################################

// 4. ####################################################################################
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
  function Dom()
  {
    foreach ($this->res as $ke12_ => $mas12_) {
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
// 4. ####################################################################################
}

class Table_fon extends Table_mass
{//наследует
  function Fon($ress, $col, $font)
  {
    $this->res = $ress;
    $this->color = $col;
    $this->font = $font;
    $this->Dom();//вызываем
  }
}

class Algoritm_cvet extends Table_mass
{
  function Cvet($varr, $col1)
  {
    $this->res = $varr;
    $this->color1 = $col1;
    $this->Algoritm1();
  }
}

$obj = new Table_mass();
$obj->dat = $data;
//$obj->res = $obj->Massiv();
$obj->Massiv();
$obj->Algoritm0();
$obj_alg = new Algoritm_cvet();
$obj_alg->Cvet($obj->res, 'gold');//закидуем res обработанный предыдущим методом в другом классе в новый
//$obj->Algoritm1();
//$obj->Dom();
$obj_dom = new Table_fon();
$obj_dom->Fon($obj_alg->res, 'red', '#fff');

?>