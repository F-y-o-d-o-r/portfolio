<?php
//error_reporting(E_ERROR);

include_once 'db_class.php';                           // 9. ПОДКЛЮЧЕНИЕ ФАЙЛА С КЛАССАМИ (БАЗОВЫМ И ПРОИЗВОДНЫМ)
$obj = new DB_class();                                   // 10. СОЗДАНИЕ ОБЪЕКТА
$obj->DB_connect();                                    // 11. МЕТОД ПОДКЛЮЧЕНИЯ К БД+УСТАНОВКИ КОДИРОВКИ

$obj_query_tag = new DB_all();                           // ...СОЗДАЕТСЯ ОБЪЕКТ...
if (isset($_POST['name_select']) or isset($_POST['poisk']) or isset($_POST['tovar']) or isset($_POST['tov_insert']) or isset($_POST['tov_update']) or isset($_POST['tov_delete'])) {                     // 13. ЕСЛИ НАЖАТА КНОПКА "ПОИСК"...
  switch (key($_POST)) {
    case name_select:
      $query = "select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar 
   WHERE name LIKE '%" . $_POST['name_select'] . "%' 
   AND tel LIKE '%" . $_POST['tel_select'] . "%' 
   AND adr LIKE '%" . $_POST['adr_select'] . "%' 
   AND tov LIKE '%" . $_POST['tov_select'] . "%' 
   AND dat LIKE '%" . $_POST['dat_select'] . "%'";                                          // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ПО ТРЕМ ТАБЛИЦАМ (user, pokup, tovar), НО С УЧЕТОМ ВВЕДЕННЫХ В ПОЛЯ ЗНАЧЕНИЙ(like)
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ select-ПОИСК ПО ВВЕДЕННЫМ В ПОЛЯ ЗНАЧЕНИЯМ(like)
      break;                                                                                                //!!! ...ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ НЕТ - ajax)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ select-МЕНЮ))
    case poisk:
      $query = "Select tov from tovar ORDER  by tov";                                             // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
      $query = "select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";                                             // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
      //$obj->DB_close();
      break;
    case tovar:
      $query = "select id_tovar, tov from tovar ORDER BY tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody_tovar', '<td onmouseover=\'kursor_start(this);\' onmouseout=\'kursor_end(this);\'>', '</td>', "<tr style=\'cursor:pointer;\' onclick=\'tov_update_delete(this);\'>", '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_insert:
      $query = "insert into tovar(tov) values('" . $_POST['tov_pole'] . "')";
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar, tov from tovar ORDER BY tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_delete:
      $query = "delete from tovar where id_tovar = " . $_POST['id_pole'];
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar, tov from tovar ORDER BY tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_update:
      $query = "update tovar set tov = '" . $_POST['tov_pole'] . "' where id_tovar = " . $_POST['id_pole'];
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar, tov from tovar ORDER BY tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
  }
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
} else {                                                 // 12. "0-Я ВЕТКА" - ТО ЖЕ (СОЗДАНИЕ ОБЪЕКТА, ФОРМИРОВАНИЕ ЗАПРОСА, ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА), НО ДЛЯ СИТУАЦИИ ДЛЯ "0-ГО" ВЫВОДА(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ+select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ))...
  $query = "Select tov from tovar ORDER  by tov";                                             // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
  $query = "select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";                                             // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
}

?>