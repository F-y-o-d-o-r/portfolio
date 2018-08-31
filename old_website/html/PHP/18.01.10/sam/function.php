<?php
error_reporting(E_ERROR);


////////////////////////////////////////////////////////
class Table_mass
{
  public $dat, $res;
  public $mas_file_name;//«НАКАПЛИВАТЬСЯ» ИМЕНА ИЗОБРАЖЕНИЙ ПРИ «СКАНИРОВАНИИ» КАТАЛОГА img

//======================================================

  function Dir_rm_mk_copy($dir)//МЕТОД «ОЧИСТКИ – СОЗДАНИЯ - КОПИРОВАНИЯ»
  {
    if (is_dir($dir)) {            // is_dir – КАТАЛОГ ЛИ? ЗДЕСЬ - СУЩЕСТВУЕТ ЛИ ТАКОЙ КАТАЛОГ?
      $mas_dir = scandir($dir);       // scandir – СКАНИРОВАНИЕ СОДЕРЖИМОГО КАТАЛОГА – РЕЗУЛЬТАТ МАССИВ ВСЕХ КАТАЛОГОВ И ФАЙЛОВ «ВНУТРИ»
      foreach ($mas_dir as $mas_dirr) {  // foreach – ЕГО ПЕРЕБОР
        unlink("$dir/$mas_dirr");  // unlink – УДАЛЕНИЕ ФАЙЛОВ (ДЛЯ УДАЛЕНИЯ САМОГО КАТАЛОГА СНАЧАЛА В ЦИКЛЕ НАДО УДАЛИТЬ ВСЕ ФАЙЛЫ В КАТАЛОГЕ (ВСЕ «ВЛОЖЕННОСТИ») ("$dir/$mas_dirr" – «UNIX-ВАРИАНТ» ЗАПИСИ, НУЖЕН ОБЯЗАТЕЛЬНО)
      }
      rmdir($dir);   // rmdir – УДАЛЕНИЕ КАТАЛОГА (ТОЛЬКО, КОГДА ПУСТ, Т.Е. СНАЧАЛА unlink (ВЫШЕ))
    }
    mkdir($dir);   // mkdir – СОЗДАНИЕ КАТАЛОГА
// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ – БЛОК КОДА ПЕРЕНОСИМ ИЗ МЕТОДА Massiv()
    for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
      if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {  //  copy – КОПИРОВАНИЕ ФАЙЛОВ
      } else {
        echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
      }
    }
  }

  function Dir_scan($dir)//МЕТОД «СКАНИРОВАНИЯ»
  {
    if (is_dir($dir)) {        // is_dir – КАТАЛОГ ЛИ? ЗДЕСЬ - СУЩЕСТВУЕТ ЛИ ТАКОЙ КАТАЛОГ?
      $mas_dir = scandir($dir);   // scandir – СКАНИРОВАНИЕ СОДЕРЖИМОГО КАТАЛОГА – РЕЗУЛЬТАТ МАССИВ ВСЕХ КАТАЛОГОВ И ФАЙЛОВ «ВНУТРИ»
      foreach ($mas_dir as $mas_dirr) {  // foreach – ЕГО ПЕРЕБОР
        if (is_file("$dir/$mas_dirr") and (strpos("$dir/$mas_dirr", 'jpg') !== false or strpos("$dir/$mas_dirr", 'gif') !== false or strpos("$dir/$mas_dirr", 'png') !== false)) {       //  is_file – ФАЙЛ ЛИ? И ОН ГРАФИЧЕСКИЙ? ("$dir/$mas_dirr" - «UNIX-ВАРИАНТ» ЗАПИСИ, НУЖЕН ОБЯЗАТЕЛЬНО)
          $this->mas_file_name[] = $mas_dirr; // В «КЛАССНОЙ» ПЕРЕМЕННОЙ НАКАПЛИВАЕМ МАССИВ ИМЕН ИЗОБРАЖЕНИЙ
        }
      }
    }
  }

  function Dell_img($dir)
  {
    unlink("$dir/" . $_POST['dell_img']);
  }


  function File_massiv($fl, $str_dop)
  {   // $str_dop – СТРОКА С НОВЫМИ (ВВЕДЕННЫМИ) ДАННЫМИ, СФОРМИРОВАНАЯ ИЗ ПРИШЕДШИХ ИЗ $_POST ДАННЫХ
    fopen($fl, 'r');
    $str_php = htmlspecialchars(file_get_contents($fl));
    $str_data = strstr($str_php, '$data=');
    $str_data = strstr($str_data, "';", true);
    fopen($fl, 'w');
    $str_data_new = "<?php $str_data$str_dop'; ?>";  // ДОБАВЛЯЕМ К СЧИТАННОЙ СТРОКЕ-МАССИВУ СТРОКУ С НОВЫМИ (ВВЕДЕННЫМИ) ДАННЫМИ (В КОНЦЕ СИМВОЛЫ ' И ;)
    file_put_contents($fl, $str_data_new);
  }

  function Massiv()
  {
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
    $mas1 = explode('||', $this->dat);
    foreach ($mas1 as $ke => $mass) {
      $mas2 = explode('|', $mass);
      foreach ($mas2 as $kee => $masss) {
        $mas12[$ke][$kee] = $masss;
      }
///////// ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
      foreach ($this->mas_file_name as $kef => $masf) {
        if (strpos(mb_strtoupper($masf), $mas12[$ke][0]) !== false) {
          if (isset($_POST['param']) or isset($_POST['dell_img'])) {
            $post_del_img = "'tbody', 'function.php', ['dell_img'], ['$masf']";
          } else {
            $post_del_img = "\'tbody\', \'function.php\', [\'dell_img\'], [\'$masf\']";
          }
          $mas12[$ke][] = '<a href="#" style="position:absolute; z-index:1; background-color:silver;" onclick="post_send(' . $post_del_img . ');return false;">удалить</a><img src="img/' . $masf . '">';
          //$mas12[$ke][] = '<img src=img/' . $masf . '>';//!!!!
          $mas12[$ke][] = date('d-m-Y');
        }
      }
/////////
    }
    $this->res = $mas12;
  }

//======================================================
  function Algoritm0()
  {
//СОРТИРОВКА
    sort($this->res);
  }

//======================================================
  function Algoritm1()
  {
    $mas12 = $this->res;
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
    $this->res = $mas12;
  }

//======================================================
  function Dom()
  {
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
    if (isset($_FILES['userfile'])) {
      echo '<script>';
      echo 'var r_tbody=window.parent.document.getElementById("tbody");';
      echo 'while(r_tbody.childNodes.length) {r_tbody.removeChild(r_tbody.childNodes[0]);};';
      echo '</script>';
    }
    foreach ($this->res as $ke12_ => $mas12_) {
      $rr = "";
      foreach ($mas12_ as $ke12__ => $mas12__) {
        //$rr=$rr."<td>$mas12__</td>";
        $st = "background-color:$this->color;";
        $rr = $rr . "<td style=$st>$mas12__</td>";
      }
      if (isset($_POST['param']) or isset($_POST['dell_img'])) {
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
  function Dom_fon($ress, $cvet)
  {
    $this->res = $ress;
    $this->color = $cvet;
    $this->Dom();
  }
}

class Table_algoritm extends Table_mass
{
  function Algoritm_kluc($ress, $klucc)
  {
    $this->res = $ress;
    $this->kluc = $klucc;
    $this->Algoritm1();
  }
}

////////////////////////////////////////////////////////
$obj = new Table_mass();  // СОЗДАНИЕ ОБЪЕКТА
if (!empty($_POST['marka']) and !empty($_POST['model']) and !empty($_POST['cena'])) {   // ЕСЛИ В ПОЛЯ ДЛЯ ЗАПИСИ БЫЛИ ВВЕДЕНЫ ДАННЫЕ…
  $obj->File_massiv('massiv.php', '||' . mb_strtoupper($_POST['marka']) . '|' . mb_strtoupper($_POST['model']) . '|' . mb_strtoupper($_POST['cena']));  // ВЫЗЫВАЕТСЯ МЕТОД File_massiv, КУДА ПЕРЕДАЕТСЯ ИМЯ ФАЙЛА ДЛЯ ДОБАВЛЕНИЯ ДАННЫХ И СФОРМИРОВАННАЯ ИЗ ВВЕДЕННЫХ ЗНАЧЕНИЙ СРОКА ('||' – НАЧАЛО,  '|' – РАЗДЕЛИТЕЛИ, mb_strtoupper – ПРЕОБРАЗОВАНИЕ К ВЕРХНЕМУ РЕГИСТРУ) (ВНИМАНИЕ!!! – ВЫЗОВ ПЕРЕД!!! include_once 'massiv.php';)
}
include_once 'massiv.php';   // ЕСЛИ БЫЛИ ВВЕДЕНЫ НОВЫЕ ДАННЫЕ, ТЕПЕРЬ ТУТ БУДЕТ ПОДКЛЮЧАТЬСЯ ОБНОВЛЕННЫЙ МАССИВ!!!, Т.К. ВЫЗОВ МЕТОДА $obj->File_massiv ОБНОВИТ ЕГО СОДЕРЖАНИЕ

if (isset($_FILES['userfile'])) {    // СРАЗУ ПОСЛЕ СОЗДАНИЯ ОБЪЕКТА – ЕСЛИ КНОПКА ЗАПИСИ ИЗОБРАЖЕНИЙ БЫЛА НАЖАТА…
  $obj->Dir_rm_mk_copy('/domains/classworks/18.01.10/sam/img/');  // ВЫЗЫВАЕМ МЕТОД «ОЧИСТКИ – СОЗДАНИЯ - КОПИРОВАНИЯ»
}

if (isset($_POST['dell_img'])) {
  $obj->Dell_img('/domains/classworks/18.01.10/sam/img/');
}
$obj->Dir_scan('/domains/classworks/18.01.10/sam/img/');  //  МЕТОД «СКАНИРОВАНИЯ»

$obj->dat = $data;
$obj->Massiv();
$obj->Algoritm0();

$obj_dom = new Table_dom();
$obj_algoritm = new Table_algoritm();
if (isset($_POST['marka'])) {
  $obj_algoritm->Algoritm_kluc($obj->res, 0);
  $obj_dom->Dom_fon($obj_algoritm->res, 'khaki');
} //+++++ $_POST['marka'], $obj_algoritm->res
else if (isset($_POST['model'])) {
  $obj_algoritm->Algoritm_kluc($obj->res, 1);
  $obj_dom->Dom_fon($obj_algoritm->res, 'lavender');
} //+++++ $_POST['model'], $obj_algoritm->res
else {
  $obj->Dom();
}
?>
