<?php
error_reporting(E_ERROR);

class DB_class {
public $link_db, $query, $row_db;                                     // 14.(НЕОБЯЗАТЕЬНО) "КЛАССНЫЕ ПЕРЕМЕННЫЕ" - $link_db-ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ, $query - ЗАПРОС SQL, $row_db - МАССИВ РЕЗУЛЬТАТА(СТРОК) ПОСЛЕ ВЫПОЛНЕНИЯ ЗАПРОСА SQL
public $id_null, $tag1, $tag11, $tag2, $tag22, $tag3, $tag33;         //"КЛАССНЫЕ ПЕРЕМЕННЫЕ" - $id_null- ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА), ТЕГИ html ДЛЯ "ОКРУЖЕНИЯ" (РАЗНЫЕ КОМБИНАЦИИ ДЛЯ РАЗНЫХ ТИПОВ ЭЛЕМЕНТОВ html)
//***********************************************************
function DB_connect() {                                               // 15. МЕТОД ПОДКЛЮЧЕНИЯ К БД
$db_host='localhost';
$db_user='root';
$db_password='';
$db_name='stat_user';
$link=mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (mysqli_connect_errno()) {
    echo "Ошибка подключения к БД: ".mysqli_connect_error();
    exit();
}
mysqli_query($link, "set names utf8");                                //УСТАНОВКА КОДИРОВКИ utf8
$this->link_db=$link;                                                 //ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ В "КЛАССНУЮ" ПЕРЕМЕННУЮ $this->link_db
}
//----------------------------------------------------------
function DB_query_all() {                                             // 16. МЕТОД БАЗОВОГО КЛАССА "ВЫПОЛНЕНИЕ ЗАПРОСА+ЗАПИСЬ РЕЗУЛЬТА В МАССИВ"
$res=mysqli_query($this->link_db, $this->query);                      //ВЫПОЛНЕНИЕ ЗАПРОСА - "КЛАССНАЯ" ПЕРЕМЕННАЯ $this->link_db - ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ, "КЛАССНАЯ" ПЕРЕМЕННАЯ $this->query - СТРОКА ЗАПРОСА SQL
while($row=mysqli_fetch_assoc($res)) {                                //ПЕРЕБОР РЕЗУЛЬТАТА - ПОСТРОЧНО
    $row_all[]=$row;                                                  //ФОРМИРОВАНИЕ $row_all(НАКОПЛЕНИЕ ПРИ ПЕРЕБОРЕ) - РЕЗУЛЬТИРУЮЩИЙ ДВУМЕРНЫЙ ДВУМЕРНЫЙ МАССИВ
}
$this->row_db=$row_all;                                               //РЕЗУЛЬТИРУЮЩИЙ ДВУМЕРНЫЙ ДВУМЕРНЫЙ МАССИВ В "КЛАССНУЮ" ПЕРЕМЕННУЮ $this->row_db
}
//----------------------------------------------------------
function DB_dom_tag() {                                               // 17. МЕТОД БАЗОВОГО КЛАССА "ВЫВОД В DOM"
   $rrr='';
foreach($this->row_db as $k1=>$mas1) {                                //ПЕРЕБОР $this->row_db - ФОРМИРОВАНИЕ СТРОК
   $rr='';
   foreach($mas1 as $k2=>$mas2) {
      if($k2=='up') {$mas2="<a href='#' id='$mas2' style='color:blue;' onclick='return false;'>".$mas2."</a>";} //ПРИ КАЖДОМ "НУЛЕВОМ" - В ЯЧЕЙКУ ТАБЛИЦЫ <a> С id=id_user/id_pokup (ДЛЯ select-МЕНЮ(ТОВАРЫ) - ПРОСТО НЕ БУДЕТ РАБОТАТЬ, Т.К. НЕТ $k2=='up')
      $rr=$rr."$this->tag1$mas2$this->tag11";                         //ОБОРАЧИВАЕМ ТЕГАМИ-1(БУДЕТ ДЛЯ ВСЕХ (select-МЕНЮ(option) И ТАБЛИЦА (td))
   }
   $rrr=$rrr."$this->tag2$rr$this->tag22";                            //ОБОРАЧИВАЕМ ТЕГАМИ-2(МОГУТ ОТСУТСТВОВАТЬ, НАПРИМЕР, ДЛЯ select-МЕНЮ)
}
$rrr="$this->tag3$rrr$this->tag33";                                   //ОБОРАЧИВАЕМ ТЕГАМИ-3(МОГУТ ОТСУТСТВОВАТЬ, НАПРИМЕР, ДЛЯ ТАБЛИЦЫ, ИСПОЗЬЗУЮТСЯ ДЛЯ <option>Все---</option> - ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_poisk.php (tov_select='';))
if(isset($_POST['name_select']) or isset($_POST['tov_insert']) or isset($_POST['tov_update']) or isset($_POST['tov_delete']) or isset($_POST['klient_insert']) or isset($_POST['klient_delete']) or isset($_POST['klient_update'])) {
   echo $rrr;                                                         //ВОЗВРАТ ИЗ ajax
}
else {                                                                //ЕСЛИ НЕТ НАЖАТИЯ КНОПКИ "Искать покупку"(ПЕРВАЯ ЗАГРУЗКА!!!)...
   echo '<script>';                                                   //ВОЗВРАТ НЕ!!! ИЗ ajax-ОБЫЧНЫЙ js
   echo "var elem=document.getElementById('$this->id_null');";        //ВЫВОД В КОНКРЕТНЫЙ ЭЛЕМЕНТ $this->id_null(МЕНЮ, ТАБЛИЦА)
   echo 'elem.innerHTML="'.$rrr.'";';
   echo '</script>';
}
}
function DB_close() {                                                 // 18. МЕТОД БАЗОВОГО КЛАССА "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
mysqli_close($this->link_db);
}
//***********************************************************
}

///////////////////////////////////////////////////////////////////
class DB_all extends DB_class {                                       // 19. ПРОИЗВОДНЫЙ КЛАСС
function Query_Dom_all($link, $query, $id_null, $tag1, $tag11, $tag2, $tag22, $tag3, $tag33) { //МЕТОД ПРОИЗВОДНОГО КЛАССА
$this->link_db=$link;                                                 //"КЛАССНЫЕ" ПЕРЕМЕННЫЕ ДЛЯ НЕОБХОДИМЫХ ТЕГОВ И ЭЛЕМЕНТА "0-ГО" ВЫВОДА...
$this->query=$query;
$this->tag1=$tag1;
$this->tag11=$tag11;
$this->tag2=$tag2;
$this->tag22=$tag22;
$this->tag3=$tag3;
$this->tag33=$tag33;
$this->id_null=$id_null;
$this->DB_query_all();                                                //НАСЛЕДОВАНИЕ - "ЗАПРОС-МАССИВ"!!!
$this->DB_dom_tag();                                                  //НАСЛЕДОВАНИЕ - "ТЕГ-DOM"!!!
}
}
///////////////////////////////////////////////////////////////////

?>
