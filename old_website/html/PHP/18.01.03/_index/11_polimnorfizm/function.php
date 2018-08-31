<?php
//полиморфизм - как вешалка
error_reporting(E_ERROR);

include_once 'massiv.php';

class Table_mass
{
  public $dat, $res;
  static public $resa;

//function Table_mass($datt) {
  function __construct($datt)
  {
    $this->dat = $datt;
  }

  private function Massiv()
  {
// 1. ####################################################################################
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
    $mas1 = explode('||', $this->dat);
    foreach ($mas1 as $ke => $mass) {
      $mas2 = explode('|', $mass);
      foreach ($mas2 as $kee => $masss) {
        $mas12[$ke][$kee] = $masss;
      }
    }
//print_r($mas12);
//$this->res=$mas12;
    self::$resa = $mas12;
// 1. ####################################################################################
  }

  function Massiv_public()
  {
    $this->Massiv();
  }

  function Algoritm0()
  {
// 2. ####################################################################################
//СОРТИРОВКА-ЦЕНА
//sort($this->res);
    sort(self::$resa);
// 2. ####################################################################################
  }

  function Algoritm1()
  {
//$mas12=$this->res;
    $mas12 = self::$resa;
// 3. ####################################################################################
//ПОЛУЧАЕМ POST ПОИСКА
    if (isset($_POST['param'])) {
//НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ         
      foreach ($mas12 as $ke12_ => $mas12_) {
        if (strpos($mas12_[0], mb_strtoupper($_POST['param'], 'utf-8')) !== false) {
          $st = "color:$this->color;";
          $mas12[$ke12_][0] = "<a href='#' style=$st>" . $mas12[$ke12_][0] . '</a>';
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
//$this->res=$mas12;
    self::$resa = $mas12;
    $this->Algoritm0();
// 3. ####################################################################################
  }

  function Dom()
  {
// 4. ####################################################################################
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
//foreach($this->res as $ke12_=>$mas12_) {
    foreach (self::$resa as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        $st = "background-color:$this->color;color:$this->colorr;";
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
// 4. ####################################################################################
  }

// ####################################################################################
  function Base_dom()//каркас
  {
    $this->Dom_vivod();
  }

// ####################################################################################

  static function Dom_static($mas)
  {
// 4. ####################################################################################
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
//foreach($this->res as $ke12_=>$mas12_) {
    foreach ($mas as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        //$st="background-color:$this->color;color:$this->colorr;";
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
// 4. ####################################################################################
  }

}

//////////////////////////////////////////////////////////////////////////////////////////
class Table_fon extends Table_mass
{
//function Fon($ress, $cvet, $cvett) {
  function Fon($cvet, $cvett)
  {
    //$this->res=$ress;
    $this->color = $cvet;
    $this->colorr = $cvett;
    $this->Dom();
  }
}

//////////////////////////////////////////////////////////////////////////////////////////
class Algoritm_cvet extends Table_mass
{
//function Cvet($ress, $cvet) {
  function Cvet($cvet)
  {
    //$this->res=$ress;
    $this->color = $cvet;
    $this->Algoritm1();
  }
}

//////////////////////////////////////////////////////////////////////////////////////////
class Dom_table extends Table_mass
{
  function Dom_vivod()
  {
    foreach (self::$resa as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
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
}

class Dom_spisok extends Table_mass
{
  function Dom_vivod()
  {
    foreach (self::$resa as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        $rr = $rr . "<li>$mas12__</li>";
      }
      if (isset($_POST['param'])) {
        $rr = "<ol>$rr</ol>";
        echo $rr;
      } else {
        echo '<script>';
        echo 'var r_tbody=document.getElementById("tbody");';
        echo 'var r_rr=document.createElement("ol");';
        echo "r_rr.innerHTML='$rr';";
        echo 'r_tbody.appendChild(r_rr);';
        echo '</script>';
      }
    }
  }
}

//////////////////////////////////////////////////////////////////////////////////////////
$obj = new Table_mass($data);
//$obj->dat=$data;
//$obj->dat='A1|A2|A3||B1|B2|B3||C1|C2|C3';
//$obj->Massiv();
$obj->Massiv_public();
//$obj->Algoritm0();
//$obj->Algoritm1();
$obj_alg = new Algoritm_cvet();
//$obj_alg->Cvet($obj->res, 'gold');
$obj_alg->Cvet('gold');
//$obj->Dom();
//$obj_fon=new Table_fon();
//$obj_fon->Fon($obj_alg->res, 'sienna', 'white');
//$obj_fon->Fon('sienna', 'white');
$obj_table = new Dom_table();
$obj_spisok = new Dom_spisok();
if (isset($_POST['param'])) {
  $obj_spisok->Base_dom();
} else {
  $obj_table->Base_dom();
}
unset($obj);
//$obj->Dom_static(array(array('A1', 'A2', 'A3'), array('B1', 'B2', 'B3'), array('C1', 'C2', 'C3')));
Table_mass::Dom_static(array(array('A1', 'A2', 'A3'), array('B1', 'B2', 'B3'), array('C1', 'C2', 'C3')));

?>
