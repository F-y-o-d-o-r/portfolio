<?php
error_reporting(E_ERROR);

include_once 'db_class.php';                           // 9. ПОДКЛЮЧЕНИЕ ФАЙЛА С КЛАССАМИ (БАЗОВЫМ И ПРОИЗВОДНЫМ)
$obj = new DB_class();                                   // 10. СОЗДАНИЕ ОБЪЕКТА
$obj->DB_connect();                                    // 11. МЕТОД ПОДКЛЮЧЕНИЯ К БД+УСТАНОВКИ КОДИРОВКИ

$obj_query_tag = new DB_all();                           // ...СОЗДАЕТСЯ ОБЪЕКТ...
if (isset($_POST['name_select']) or isset($_POST['poisk']) or isset($_POST['tovar']) or isset($_POST['tov_insert']) or isset($_POST['tov_update']) or isset($_POST['tov_delete']) or isset($_POST['klient']) or isset($_POST['klient_insert']) or isset($_POST['klient_delete']) or isset($_POST['klient_update']) or isset($_POST['sort_top']) or isset($_POST['sort_bottom'])) {                     // 13. ЕСЛИ НАЖАТА КНОПКА "ПОИСК"...
  switch (key($_POST)) {
    case name_select:
      $query = "show create table pokupki_tmp";
      $res = mysqli_query($obj->link_db, $query);
      if (!mysqli_num_rows($res)) {//if not 0 is table
        $query = "create table pokupki_tmp(
up varchar(50) not null,
name varchar(100) not null,
tel varchar(100) not null,
adr varchar(100) not null,
tov varchar(100) not null,
dat date not null
)";
        mysqli_query($obj->link_db, $query);
      } else {
        $query = "delete from pokipki_tmp";
        mysqli_query($obj->link_db, $query);
      }
      $query = "insert into pokupki_tmp select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   name like '%" . $_POST['name_select'] . "%' and
   tel like '%" . $_POST['tel_select'] . "%'  and
   adr like '%" . $_POST['adr_select'] . "%'  and
   tovar.id_tovar = " . $_POST['tov_select'] . " and
   dat like '%" . $_POST['dat_select'] . "%'";  // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ПО ТРЕМ ТАБЛИЦАМ (user, pokup, tovar), НО С УЧЕТОМ ВВЕДЕННЫХ В ПОЛЯ ЗНАЧЕНИЙ(like)
      mysqli_query($obj->link_db, $query);
      $query = 'select * from pokupki_tmp';
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ select-ПОИСК ПО ВВЕДЕННЫМ В ПОЛЯ ЗНАЧЕНИЯМ(like)
      break;                                                                                               //!!! ...ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ НЕТ - ajax)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ select-МЕНЮ))
    case poisk:
      //$query = "select tov from tovar order by tov";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
      $query = "select concat(id_tovar, '#', tov) as tov from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
      $query = "select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";       // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
      echo '<script>
func_select_extract("form_select", "sel_tov");
</script>';
      break;
    case tovar:
      $query = "select id_tovar,tov from tovar order by tov";
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
      $query = "select id_tovar,tov from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;                                                                                                   //!!! ...ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ НЕТ - ajax)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ select-МЕНЮ))
    case tov_update:
      $query = "update tovar set tov='" . $_POST['tov_pole'] . "' where id_tovar=" . $_POST['id_pole'];
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar,tov from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_delete:
      $query = "delete from tovar where id_tovar=" . $_POST['id_pole'];
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar,tov from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case klient:
      $query = "select id_user, name, tel, adr from user order by name";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody_klient', '<td>', '</td>', '<tr style=\'cursor:pointer;\' onmouseover=\'kursor_start(this);\' onmouseout=\'kursor_end(this);\' onclick=\'klient_update_delete(this);\'>', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_klient.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case klient_insert:
      $query = "insert into user(name, tel, adr) values('" . $_POST['klient_name_pole'] . "','" . $_POST['klient_tel_pole'] . "','" . $_POST['klient_adr_pole'] . "')";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      $query = "select id_user, name, tel, adr from user order by name";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_klient.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case klient_update:
      $query = "update user set name='" . $_POST['klient_name_pole'] . "', tel='" . $_POST['klient_tel_pole'] . "', adr='" . $_POST['klient_adr_pole'] . "' where id_user=" . $_POST['id_pole'];
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      $query = "select id_user, name, tel, adr from user order by name";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_klient.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case klient_delete:
      $query = "delete from user where id_user=" . $_POST['id_pole'];
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      $query = "select id_user, name, tel, adr from user order by name";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_klient.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case sort_top:
      $query = "select * from pokupki_tmp order by dat";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      break;
    case sort_bottom:
      $query = "select * from pokupki_tmp order by dat desc";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      break;
  }
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
} else {               // 12. "0-Я ВЕТКА" - ТО ЖЕ (СОЗДАНИЕ ОБЪЕКТА, ФОРМИРОВАНИЕ ЗАПРОСА, ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА), НО ДЛЯ СИТУАЦИИ ДЛЯ "0-ГО" ВЫВОДА(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ+select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ))...
  //$query = "select tov from tovar order by tov";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
  $query = "select concat(id_tovar, '#', tov) as tov from tovar order by tov";
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
  $query = "select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";       // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
  echo '<script>
func_select_extract("form_select", "sel_tov");
</script>';
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
}

?>
<!--при елсе и при кейс поиск чтобы была темповая стр!!!-->
