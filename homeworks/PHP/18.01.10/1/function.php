<?php
// ОТКЛЮЧАЕМ ПРЕДУПРЕЖДЕНИЯ
error_reporting(E_ERROR);
//session_start();

include_once 'array.php';

////////////////////////////////////////////////////////
/*abstract class Table
{
  public static $res;
  public static $fromImg;
  public static $mas_file_name;//«НАКАПЛИВАТЬСЯ» ИМЕНА ИЗОБРАЖЕНИЙ ПРИ «СКАНИРОВАНИИ» КАТАЛОГА img

  abstract function Massiv();

  function Algoritm0()
  {
    usort(self::$res, array($this, 'func_sort'));
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

  abstract function Algoritm1();

  abstract function Dom();

}*/

////////////////////////////////////////////////////////
class Table_mass/* extends Table*/
{
  public static $res;
  public static $fromImg;
  public $mas_file_name;

  //static public $res;
  function __construct($dat = 0)
  {
    $this->dat = $dat;
  }


  function Dir_rm_mk_copy($dir)//МЕТОД «ОЧИСТКИ – СОЗДАНИЯ - КОПИРОВАНИЯ»
  {
    /*if (is_dir($dir)) {
      $mas_dir = scandir($dir);
      foreach ($mas_dir as $mas_dirr) {
        unlink("$dir/$mas_dirr");
      }
      rmdir($dir);
    }*/
    mkdir($dir);
// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ – БЛОК КОДА ПЕРЕНОСИМ ИЗ МЕТОДА Massiv()
    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
      if (copy($_FILES['file']['tmp_name'][$i], $dir . $_FILES['file']['name'][$i])) {  //  copy – КОПИРОВАНИЕ ФАЙЛОВ
      } else {
        echo 'Файл(ы) ' . $_FILES['file']['name'][$i] . ' загрузить не удалось!<br>';
      }
    }
  }

  function Dir_scan($dir)//МЕТОД «СКАНИРОВАНИЯ»
  {
    if (is_dir($dir)) {
      $mas_dir = scandir($dir);
      foreach ($mas_dir as $mas_dirr) {
        if (is_file("$dir/$mas_dirr") and (strpos("$dir/$mas_dirr", 'jpg') !== false or strpos("$dir/$mas_dirr", 'gif') !== false or strpos("$dir/$mas_dirr", 'png') !== false)) {
          $this->mas_file_name[] = $mas_dirr;
        }
      }
    }
  }

  function Dell_img($dir)
  {
    unlink("$dir" . $_POST['dell_img']);
  }

  function dellAll($dir)
  {
    if (is_dir($dir)) {
      $mas_dir = scandir($dir);
      foreach ($mas_dir as $mas_dirr) {
        //if(isset($mas_dirr)) { //wrong
        if(is_file("$dir$mas_dirr")) {
          //echo "$dir$mas_dirr<br>";
          unlink("$dir$mas_dirr");
        }

      }
      rmdir($dir);
    }
  }

//======================================================
  function Massiv()
  {
// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ
    //if (isset($_FILES['file'])) {
    //  $dir = "/domains/homeworks/2018.01.10/1/img/";
    //  //$dir='/home/forum/www/';
    //  session_unset();
    //  for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
    //    $name = $_FILES['file']['name'][$i];
    //    $_SESSION['img'] .= $name . '%';
    //    if (copy($_FILES['file']['tmp_name'][$i], $dir . $_FILES['file']['name'][$i])) {
    //    } else {
    //      echo 'Файл(ы) ' . $_FILES['file']['name'][$i] . ' загрузить не удалось!<br>';
    //    }
    //  }
    //}
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
    $mas1 = explode('||', $this->dat);
    foreach ($mas1 as $ke => $mass) {
      $mas2 = explode('|', $mass);
      foreach ($mas2 as $kee => $masss) {
        $mas12[$ke][$kee] = $masss;
      }
      ///////// ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
      if (isset($this->mas_file_name)) {
        foreach ($this->mas_file_name as $kef => $masf) {  //%%%%%
          if (strpos(mb_strtoupper($masf), $mas12[$ke][0]) !== false) {
            //echo  $masf;
            if (isset($_POST['search_what_model']) or isset($_POST['search_what']) or isset($_POST['dell_img'])) {
              $post_del_img = "'tbody', 'function.php', ['dell_img'], ['$masf']";
            } else {
              $post_del_img = "\'tbody\', \'function.php\', [\'dell_img\'], [\'$masf\']";
            }
            //$mas12[$ke][] = '<img src="' . $masf . '">';
            $mas12[$ke][] = '<a href="#" style="position:absolute; z-index:1; background-color:silver;" onclick="post_send(' . $post_del_img . ');return false;">удалить</a><img src="img/' . $masf . '">';
            $mas12[$ke][] = date('d-m-Y');
          }
        }
      }
      //}
    }
    self::$res = $mas12;
  }

//======================================================
  function Algoritm0()//сортировка по умолчанию
  {
//СОРТИРОВКА
    usort(self::$res, array($this, 'func_sort'));
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

//======================================================
  function Algoritm1()//поиск и переставление
  {
    $mas12 = self::$res;
// ПОЛУЧАЕМ POST ПОИСКА
    if (isset($_POST['search_what']) or isset($_POST['search_what_model'])) {
// НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
      foreach ($mas12 as $ke12_ => $mas12_) { //+++++ $this->kluc
        if ((isset($_POST['search_what']) and strpos($mas12_[$this->kluc], mb_strtoupper($_POST['search_what'])) !== false) or (isset($_POST['search_what_model']) and strpos($mas12_[$this->kluc], mb_strtoupper($_POST['search_what_model'])) !== false)) { // НАЙТИ ВХОЖДЕНИЕ В "МАРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
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
    self::$res = $mas12;
  }

//======================================================
  function Dom()//вывод в дом
  {
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
    //if (isset($_FILES['file'])) {//
    //echo '<script>';
    //echo 'window.parent.clearInterval(window.parent.int);';      //!!!!!
    //echo 'window.parent.mass_img=new Array();';      //!!!!!
    //echo 'window.parent.i=0;';      //!!
    //echo 'var r_tbody=window.parent.document.getElementById("tbody");';
    //echo 'while(r_tbody.childNodes.length) {r_tbody.removeChild(r_tbody.childNodes[0]);};';
    //for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    //  echo 'window.parent.mass_img[' . $i . ']="' . $_FILES['file']['name'][$i] . '";';    //%%%
    //}
    //echo 'window.parent.int=window.parent.setInterval("func_img()", 1500);';    //%%%
    //echo '</script>';
    //}
    foreach (self::$res as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        $st = "background-color:$this->color;";
        $rr = $rr . "<td style=$st>$mas12__</td>";
      }
      if (isset($_POST['search_what']) or isset($_POST['search_what_model']) or isset($_POST['dell_img'])) {
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


class Table_algoritm extends Table_mass//2я сортировка по модели
{
  function Algoritm_kluc($klucc)
  {
    $this->kluc = $klucc;
    $this->Algoritm1();
  }
}

////////////////////////////////////////////////////////
class Table_dom extends Table_mass
{
  function Dom_fon($cvet)
  {
    $this->color = $cvet;
    $this->Dom();
  }
}

////////////////////////////////////////////////////////

$obj = new Table_mass($data);

if (isset($_FILES['file'])) {    // СРАЗУ ПОСЛЕ СОЗДАНИЯ ОБЪЕКТА – ЕСЛИ КНОПКА ЗАПИСИ ИЗОБРАЖЕНИЙ БЫЛА НАЖАТА…
  $obj->dellAll('/domains/homeworks/2018.01.10/1/img/');
  $obj->Dir_rm_mk_copy('/domains/homeworks/2018.01.10/1/img/');  // ВЫЗЫВАЕМ МЕТОД «ОЧИСТКИ – СОЗДАНИЯ - КОПИРОВАНИЯ»
}

if (isset($_POST['dell_all'])) {
  $obj->dellAll('/domains/homeworks/2018.01.10/1/img/');
}

if (isset($_POST['dell_img'])) {
  $obj->Dell_img('/domains/homeworks/2018.01.10/1/img/');
}

$obj->Dir_scan('/domains/homeworks/2018.01.10/1/img/');  //  МЕТОД «СКАНИРОВАНИЯ»

$obj->Massiv();
$obj->Algoritm0();

$obj_algoritm = new Table_algoritm();

$obj_dom = new Table_dom();

if (isset($_POST['search_what'])) {
  $obj_algoritm->Algoritm_kluc(0);
  $obj_dom->Dom_fon('khaki');
} else if (isset($_POST['search_what_model'])) {
  $obj_algoritm->Algoritm_kluc(1);
  $obj_dom->Dom_fon('lavender');
} else if (isset($_FILES['file'])) {
  $obj_dom->Dom_fon('lightgreen');
} else {
  $obj->Dom();
}
?>