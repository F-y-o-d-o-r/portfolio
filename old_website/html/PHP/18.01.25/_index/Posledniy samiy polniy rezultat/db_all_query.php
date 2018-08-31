<?php
error_reporting(E_ERROR);

include_once 'db_class.php';                           // 9. ПОДКЛЮЧЕНИЕ ФАЙЛА С КЛАССАМИ (БАЗОВЫМ И ПРОИЗВОДНЫМ)
$obj = new DB_class();                                   // 10. СОЗДАНИЕ ОБЪЕКТА
$obj->DB_connect();                                    // 11. МЕТОД ПОДКЛЮЧЕНИЯ К БД+УСТАНОВКИ КОДИРОВКИ

$obj_query_tag = new DB_all();                           // ...СОЗДАЕТСЯ ОБЪЕКТ...
if (isset($_POST['name_select']) or isset($_POST['poisk']) or isset($_POST['tovar']) or isset($_POST['tov_insert']) or isset($_POST['tov_update']) or isset($_POST['tov_delete']) or isset($_POST['klient']) or isset($_POST['klient_insert']) or isset($_POST['klient_delete']) or isset($_POST['klient_update']) or isset($_POST['sort_top']) or isset($_POST['sort_bottom']) or isset($_POST['pokup_update_delete']) or isset($_POST['pokup_delete']) or isset($_POST['pokup_update']) or isset($_POST['name_pokup_select']) or isset($_POST['tov_pokup_select'])) {                     // 13. ЕСЛИ НАЖАТА КНОПКА "ПОИСК"...
  switch (key($_POST)) {
    case name_select:
      $query = "show create table pokupki_tmp";
      $res = mysqli_query($obj->link_db, $query);
      if (mysqli_num_rows($res) != 1) {
        $query = "create table pokupki_tmp(
up varchar(50) not null,
name varchar(100) not null,
tel varchar(100) not null,
adr varchar(100) not null,
tov varchar(100) not null,
image varchar(100) not null,
dat date not null
)";
        mysqli_query($obj->link_db, $query);
      } else {
        $query = "delete from pokupki_tmp";
        mysqli_query($obj->link_db, $query);
      }
      //$name=mysqli_real_escape_string($obj->link_db, $_POST['name_select']);
      if ($_POST['name_select'] != '') {
        $select_name = "user.id_user=" . intval($_POST['name_select']);
      } else {
        $select_name = "user.id_user in (select id_user from user)";
      }
      $tel = mysqli_real_escape_string($obj->link_db, $_POST['tel_select']);
      $adr = mysqli_real_escape_string($obj->link_db, $_POST['adr_select']);
      //$id_tov=intval($_POST['tov_select']);
      if ($_POST['tov_select'] != '') {
        $select_tov = "tovar.id_tovar=" . intval($_POST['tov_select']);
      } else {
        $select_tov = "tovar.id_tovar in (select id_tovar from tovar)";
      }
      $dat = mysqli_real_escape_string($obj->link_db, $_POST['dat_select']);
      $query = "insert into pokupki_tmp select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   " . $select_name . " and
   tel like '%" . $tel . "%'  and
   adr like '%" . $adr . "%'  and
   " . $select_tov . "  and
   dat like '%" . $dat . "%'";  // !!!!!...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ПО ТРЕМ ТАБЛИЦАМ (user, pokup, tovar), НО С УЧЕТОМ ВВЕДЕННЫХ В ПОЛЯ ЗНАЧЕНИЙ(like)
      mysqli_query($obj->link_db, $query);
      $query = "select * from pokupki_tmp";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ select-ПОИСК ПО ВВЕДЕННЫМ В ПОЛЯ ЗНАЧЕНИЯМ(like)
      break;                                                                                               //!!! ...ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ НЕТ - ajax)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ select-МЕНЮ))
    case poisk:
      $query = "select concat(id_tovar, '#', tov) as tov from tovar order by tov";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
      echo '<script>
func_select_extract("form_select", "sel_tov");
</script>';
      $query = "select concat(id_user, '#', name) as users from user order by name";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_name_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
      echo '<script>
func_select_extract("form_select", "sel_name");
</script>';
      $query = "show create table pokupki_tmp";
      $res = mysqli_query($obj->link_db, $query);
      if (mysqli_num_rows($res) != 1) {
        $query = "create table pokupki_tmp(
up varchar(50) not null,
name varchar(100) not null,
tel varchar(100) not null,
adr varchar(100) not null,
tov varchar(100) not null,
image varchar(100) not null,
dat date not null
)";
        mysqli_query($obj->link_db, $query);
      } else {
        $query = "delete from pokupki_tmp";
        mysqli_query($obj->link_db, $query);
      }
      $query = "insert into pokupki_tmp select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";       // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
      mysqli_query($obj->link_db, $query);
      $query = "select * from pokupki_tmp";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
      break;
    case sort_top:
      $query = "select * from pokupki_tmp order by dat desc";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      break;
    case sort_bottom:
      $query = "select * from pokupki_tmp order by dat";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td>', '</td>', '<tr>', '</tr>', '', '');
      break;
    case tovar:
      //$dir = '/home/localhost/www/img/tmp/';
      $dir = '/home/u978026000/public_html/html/PHP/18.01.25/_index/Posledniy%20samiy%20polniy%20rezultat/img/tmp/';
      $arr_dir = scandir($dir);
      foreach ($arr_dir as $arr_dirr) {
        unlink("$dir/$arr_dirr");
      }
      $query = "select id_tovar,tov, image from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody_tovar', '<td onmouseover=\'kursor_start(this);\' onmouseout=\'kursor_end(this);\'>', '</td>', "<tr style=\'cursor:pointer;\' onclick=\'tov_update_delete(this);\'>", '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_insert:
      $dir = '/home/u978026000/public_html/html/PHP/18.01.25/_index/Posledniy%20samiy%20polniy%20rezultat/img/tmp/';
      $tov_img = mysqli_real_escape_string($obj->link_db, $_POST['tov_img']);
      if (strpos($tov_img, 'tmp')) {
        $imgg = substr($tov_img, 11);
        $imgg = 'img/a' . $imgg;
        rename("$dir/$tov_img", "$dir/$imgg");
      } else {
        $imgg = 'img/nophoto.jpg';
      }
      $tov = mysqli_real_escape_string($obj->link_db, $_POST['tov_pole']);
      $query = "insert into tovar(tov, image) values('" . $tov . "','" . $imgg . "')";
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar,tov, image from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;                                                                                                   //!!! ...ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ НЕТ - ajax)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ select-МЕНЮ))
    case tov_update:
      $id = intval($_POST['id_pole']);
      $dir = '/home/u978026000/public_html/html/PHP/18.01.25/_index/Posledniy%20samiy%20polniy%20rezultat/img/tmp/';
      $tov_img = mysqli_real_escape_string($obj->link_db, $_POST['tov_img']);
      if (strpos($tov_img, 'tmp')) {
        $imgg = substr($tov_img, 11);
        $imgg = 'img/a' . $imgg;
        rename("$dir/$tov_img", "$dir/$imgg");
        $obj->query = "select image from tovar where id_tovar =" . $id;
        $obj->DB_query_all();
        $img_old = $obj->row_db[0]['image'];
        if (!strpos($img_old, 'nophoto')) {
          unlink("$dir/$img_old");
        }
      } else {
        $imgg = $tov_img;
      }
      $tov = mysqli_real_escape_string($obj->link_db, $_POST['tov_pole']);
      $query = "update tovar set tov='" . $tov . "',image = '" . $imgg . "' where id_tovar=" . $id;
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar,tov, image from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, '', '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
      echo '<script>
var arr_tr=tbody_tovar.getElementsByTagName("tr");
for(var i=0; i<arr_tr.length; i++) {
arr_tr[i].childNodes[0].style.visibility="hidden";
}
</script>';
      break;
    case tov_delete:
      $dir = '/home/u978026000/public_html/html/PHP/18.01.25/_index/Posledniy%20samiy%20polniy%20rezultat/img/tmp/';
      $tov_img = mysqli_real_escape_string($obj->link_db, $_POST['tov_img']);
      if (!strpos($tov_img, 'nophoto')) {
        unlink("$dir/$tov_img");
      }
      $id = intval($_POST['id_pole']);
      $query = "delete from tovar where id_tovar=" . $id;
      mysqli_query($obj->link_db, $query);
      $query = "select id_tovar,tov, image from tovar order by tov";
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
      $name = mysqli_real_escape_string($obj->link_db, $_POST['klient_name_pole']);
      $tel = mysqli_real_escape_string($obj->link_db, $_POST['klient_tel_pole']);
      $adr = mysqli_real_escape_string($obj->link_db, $_POST['klient_adr_pole']);
      $query = "insert into user(name, tel, adr) values('" . $name . "','" . $tel . "','" . $adr . "')";
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
      $name = mysqli_real_escape_string($obj->link_db, $_POST['klient_name_pole']);
      $tel = mysqli_real_escape_string($obj->link_db, $_POST['klient_tel_pole']);
      $adr = mysqli_real_escape_string($obj->link_db, $_POST['klient_adr_pole']);
      $id = intval($_POST['id_pole']);
      $query = "update user set name='" . $name . "', tel='" . $tel . "', adr='" . $adr . "' where id_user=" . $id;
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
      $id = intval($_POST['id_pole']);
      $query = "delete from user where id_user=" . $id;
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
    case pokup_update_delete:
      $query = "select name from user order by name";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_name_id_pokup', '<option>', '</option>', '', '', '', '');
      $query = "select tov from tovar order by tov";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id_pokup', '<option>', '</option>', '', '', '', '');
      $query = "select day from day order by day";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'day_pokup_id', '<option>', '</option>', '', '', '', '');
      $query = "select month from month order by month";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'month_pokup_id', '<option>', '</option>', '', '', '', '');
      $query = "select yar from yar order by yar";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'yar_pokup_id', '<option>', '</option>', '', '', '', '');
      $use = strstr($_POST['pokup_update_delete'], '/', true);
      $pok = substr($_POST['pokup_update_delete'], strpos($_POST['pokup_update_delete'], '/') + 1);
      $use = intval($use);
      $pok = intval($pok);
      $obj->query = "select user.id_user as id_use, name, tel, adr, tovar.id_tovar as id_tov, tov, image, pokup.id_pokup as id_pok, substring(dat,9,2) as day_substr, substring(dat,6,2) as month_substr, substring(dat,1,4) as yar_substr from user
join pokup on user.id_user=pokup.id_user
join tovar on pokup.id_tovar=tovar.id_tovar where
user.id_user=" . $use . " and pokup.id_pokup=" . $pok;
      $obj->DB_query_all();
      $obj->row_db[0]['tov'] = str_replace("'", "", $obj->row_db[0]['tov']);
      break;
    case pokup_delete:
      $id = intval($_POST['pok_id']);
      $query = "delete from pokup where id_pokup = " . $id;
      mysqli_query($obj->link_db, $query);
      echo '<script>
jquery_send(\'#okno\', \'post\', \'db_poisk.php\', [\'poisk\'], []);
</script>';
      break;
    case pokup_update:
      $pok_id = intval($_POST['pok_id']);
      $name_id = intval($_POST['name_id_new']);
      $tov_id = intval($_POST['tov_id_new']);
      $dat = mysqli_real_escape_string($obj->link_db, $_POST['dat_new']);
      $query = "update pokup set id_user=" . $name_id . ", id_tovar=" . $tov_id . ", dat='" . $dat . "' where id_pokup=" . $pok_id;
      mysqli_query($obj->link_db, $query);
      echo '<script>
jquery_send("#okno", "post", "db_poisk.php", ["poisk"], []);
</script>';
      break;
    case name_pokup_select:
      $name_pokup_sel = mysqli_real_escape_string($obj->link_db, $_POST['name_pokup_select']);
      $query = "select tel from user where name='" . $name_pokup_sel . "'";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tel_pole_pokup_id', '', '', '', '', '', '');
      $query = "select adr from user where name='" . $name_pokup_sel . "'";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'adr_pole_pokup_id', '', '', '', '', '', '');
      $query = "select id_user from user where name='" . $name_pokup_sel . "'";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'name_id', '', '', '', '', '', '');
      break;
    case tov_pokup_select:
      $tov_pokup_sel = mysqli_real_escape_string($obj->link_db, $_POST['tov_pokup_select']);
      $query = "select id_tovar from tovar where tov='" . $tov_pokup_sel . "'";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tov_id', '', '', '', '', '', '');
      $query = "select image from tovar where tov='" . $tov_pokup_sel . "'";
      $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'pokup_img', '', '', '', '', '', '');
      break;
  }
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
} else {               // 12. "0-Я ВЕТКА" - ТО ЖЕ (СОЗДАНИЕ ОБЪЕКТА, ФОРМИРОВАНИЕ ЗАПРОСА, ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА), НО ДЛЯ СИТУАЦИИ ДЛЯ "0-ГО" ВЫВОДА(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ+select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ))...
  $query = "select concat(id_user, '#', name) as users from user order by name";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_name_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
  echo '<script>
func_select_extract("form_select", "sel_name");
</script>';
  $query = "select concat(id_tovar, '#', tov) as tov from tovar order by tov";           // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-select-МЕНЮ...
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА(select-МЕНЮ НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'sel_tov_id' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В select-МЕНЮ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<option>', '</option>', СРЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ tr, td)), В ПОСЛЕДНЕЙ "ПАРЕ" - ТОЛЬКО '<option>Все---</option>' ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_osnova.php (tov_select='';))
  echo '<script>
func_select_extract("form_select", "sel_tov");
</script>';
  $query = "show create table pokupki_tmp";
  $res = mysqli_query($obj->link_db, $query);
  if (mysqli_num_rows($res) != 1) {
    $query = "create table pokupki_tmp(
up varchar(50) not null,
name varchar(100) not null,
tel varchar(100) not null,
adr varchar(100) not null,
tov varchar(100) not null,
image varchar(100) not null,
dat date not null
)";
    mysqli_query($obj->link_db, $query);
  } else {
    $query = "delete from pokupki_tmp";
    mysqli_query($obj->link_db, $query);
  }
  $query = "insert into pokupki_tmp select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar";       // ...ФОРМИРУЕТСЯ СТРОКА ЗАПРОСА ДЛЯ "0-ГО" ВЫВОДА-ТАБЛИЦА...
  mysqli_query($obj->link_db, $query);
  $query = "select * from pokupki_tmp";
  $obj_query_tag->Query_Dom_all($obj->link_db, $query, 'tbody', '<td>', '</td>', '<tr>', '</tr>', '', ''); //!!! ...ВЫЗОВ МЕТОДА ПРОИЗВОДНОГО КЛАССА (НАСЛЕДОВАНИЕ - ВЫЗОВ 2-Х МЕТОВ БАЗОВОГО КЛАССА(ВЫПОЛНЕНИЕ ЗАПРОСА И ВЫВОД В DOM) ДЛЯ "0-ГО" ВЫВОДА"(ТАБЛИЦА НАЧАЛЬНОЙ ЗАГРУЗКИ). ПРИ ЭТОМ, В КАЧЕСТВЕ ПАРАМЕТРОВ МОГУТ(!!!) ПЕРЕДАВАТЬСЯ : 'tbody' - ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА)(ТУТ ВЫВОД В ТАБЛИЦУ)+НЕОБХОДИМЫЕ ТЕГИ html (ТУТ '<td>', '</td>', '<tr>', '</tr>', ПОСЛЕДНЯЯ "ПАРА" ('', '') ЗДЕСЬ НЕ ИСПОЛЬЗУЕТСЯ (ЭТО ДЛЯ option))
  $obj->DB_close();                                      // ...ПОСЛЕ ВЫПОЛНЕНИЯ - МЕТОД "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
}

?>