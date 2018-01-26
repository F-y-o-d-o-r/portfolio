<?php
error_reporting(E_ERROR);
session_start();    //%%%%%

include_once 'massiv.php';

abstract class Table
{              //!!!...
  public static $resa;                //!!!...

  abstract function Massiv();

  function Algoritm0()
  {
    usort(self::$resa, array($this, 'func_sort'));
  }  //!!!...

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

  abstract function Algoritm1();

  abstract function Dom();
}

////////////////////////////////////////////////////////
class Table_mass extends Table
{
  public $dat, $res;

//======================================================
  function Massiv()
  {
// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ
    if (isset($_FILES['userfile'])) {
      session_unset();    //%%%%%
      $dir = '/home/localhost/www/';
      for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
        //copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i]);
        if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
          //echo $_FILES['userfile']['name'][$i].'<br>';
          $_SESSION['img'] = $_SESSION['img'] . $_FILES['userfile']['name'][$i] . '%';   //%%%%%
        } else {
          echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
        }
      }
    }
    if (isset($_SESSION['img'])) {         //%%%%%
      $mas_file_name = explode('%', $_SESSION['img']);     //%%%%%
    }
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
    $mas1 = explode('||', $this->dat);
    foreach ($mas1 as $ke => $mass) {
      $mas2 = explode('|', $mass);
      foreach ($mas2 as $kee => $masss) {
        $mas12[$ke][$kee] = $masss;
      }
///////// ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
      //if(isset($_FILES['userfile'])) {   //%%%%%
      if (isset($_SESSION['img'])) {    //%%%%%
        //foreach($_FILES['userfile']['name'] as $kef=>$masf) { //%%%%%
        foreach ($mas_file_name as $kef => $masf) {  //%%%%%
          if (strpos(mb_strtoupper($masf), $mas12[$ke][0]) !== false) {
            $mas12[$ke][] = '<img src="' . $masf . '">';
            $mas12[$ke][] = date('d-m-Y');
          }
        }
      }
/////////
    }
//print_r($mas12);
//$this->res=$mas12;
    self::$resa = $mas12;
  }
//======================================================
  /*
  function Algoritm0() {
  //СОРТИРОВКА
  //sort($this->res);
  usort(self::$resa, array($this, 'func_sort'));
  }
  function func_sort($a1, $a2) {
  if($a1[2]>$a2[2]) {return 1;}
  else if($a1[2]==$a2[2]) {return 0;}
  else {return 0;}
  }
  */
//======================================================
  function Algoritm1()
  {
//$mas12=$this->res;
    $mas12 = self::$resa;
// ПОЛУЧАЕМ POST ПОИСКА
    if (isset($_POST['param'])) {
// НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
      foreach ($mas12 as $ke12_ => $mas12_) { //+++++ $this->kluc
        if (strpos($mas12_[$this->kluc], mb_strtoupper($_POST['param'])) !== false) { // НАЙТИ ВХОЖДЕНИЕ В "МАРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
          $mas12[$ke12_][$this->kluc] = '<a href="#" style="color:red;">' . $mas12[$ke12_][$this->kluc] . '</a>'; // ВЫДЕЛИТЬ ПО ВНЕШНЕМУ КЛЮЧУ(СТРОКА) ЭЛЕМЕНТ "0" (УЖЕ БЕЗ array_search)
          //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
          foreach ($mas12[$ke12_] as $kee => $masss) {
            if ($kee != $this->kluc) {                                                // ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
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
  }

//======================================================
  function Dom()
  {
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
    if (isset($_FILES['userfile'])) {
      echo '<script>';
      echo 'window.parent.clearInterval(window.parent.int);';      //!!!!!
      echo 'window.parent.mass_img=new Array();';      //!!!!!
      echo 'window.parent.i=0;';      //!!
      echo 'var r_tbody=window.parent.document.getElementById("tbody");';
      echo 'while(r_tbody.childNodes.length) {r_tbody.removeChild(r_tbody.childNodes[0]);};';
      for ($i = 0; $i < count($_FILES['userfile']['name']); $i++) {
        echo 'window.parent.mass_img[' . $i . ']="' . $_FILES['userfile']['name'][$i] . '";';    //%%%
      }
      echo 'window.parent.int=window.parent.setInterval("func_img()", 1500);';    //%%%
      echo '</script>';
    }
    foreach (self::$resa as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        //$rr=$rr."<td>$mas12__</td>";
        $st = "background-color:$this->color;";
        $rr = $rr . "<td style=$st>$mas12__</td>";
      }
      if (isset($_POST['param'])) {
        $rr = "<tr>$rr</tr>";
        echo $rr;
      } else {
        echo '<script>';
        echo 'var r_tbody=window.parent.document.getElementById("tbody");';
        echo 'var r_rr=window.parent.document.createElement("tr");';
        echo "r_rr.innerHTML='$rr';";
        echo 'r_tbody.appendChild(r_rr);';
        echo '</script>';
      }
    }
  }
//======================================================
}

////////////////////////////////////////////////////////
class Table_dom extends Table_mass
{
//function Dom_fon($ress, $cvet) {
  function Dom_fon($cvet)
  {
    //$this->res=$ress;
    $this->color = $cvet;
    $this->Dom();
  }
}

class Table_algoritm extends Table_mass
{
//function Algoritm_kluc($ress, $klucc) {
  function Algoritm_kluc($klucc)
  {
    //$this->res=$ress;
    $this->kluc = $klucc;
    $this->Algoritm1();
  }
}

////////////////////////////////////////////////////////
$obj = new Table_mass();
$obj->dat = $data;
$obj->Massiv();
$obj->Algoritm0();
//$obj->Algoritm1();
$obj_dom = new Table_dom();
$obj_algoritm = new Table_algoritm();
if (isset($_POST['marka'])) {
  $obj_algoritm->Algoritm_kluc(0);
  $obj_dom->Dom_fon('khaki');
} //+++++ $_POST['marka'], $obj_algoritm->res
else if (isset($_POST['model'])) {
  $obj_algoritm->Algoritm_kluc(1);
  $obj_dom->Dom_fon('lavender');
} //+++++ $_POST['model'], $obj_algoritm->res
else if (isset($_FILES['userfile'])) {
  $obj_dom->Dom_fon('lightgreen');
} else {
  $obj->Dom();
}

?>
