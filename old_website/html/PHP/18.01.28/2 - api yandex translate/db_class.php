<?php
error_reporting(E_ERROR);

class DB_class
{
  public $link_db, $query, $row_db;                                     // 14.(НЕОБЯЗАТЕЬНО) "КЛАССНЫЕ ПЕРЕМЕННЫЕ" - $link_db-ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ, $query - ЗАПРОС SQL, $row_db - МАССИВ РЕЗУЛЬТАТА(СТРОК) ПОСЛЕ ВЫПОЛНЕНИЯ ЗАПРОСА SQL
  public $id_null, $tag1, $tag11, $tag2, $tag22, $tag3, $tag33;         //"КЛАССНЫЕ ПЕРЕМЕННЫЕ" - $id_null- ЭЛЕМЕНТ ДЛЯ "0-ГО" ВЫВОДА(ПЕРВАЯ ЗАГРУЗКА), ТЕГИ html ДЛЯ "ОКРУЖЕНИЯ" (РАЗНЫЕ КОМБИНАЦИИ ДЛЯ РАЗНЫХ ТИПОВ ЭЛЕМЕНТОВ html)

//***********************************************************
  function DB_connect()
  {                                               // 15. МЕТОД ПОДКЛЮЧЕНИЯ К БД
    $db_host='localhost';
    $db_user='root';
    $db_password='';
    $db_name='stat_user';
    $connect_db_json = file_get_contents('http://connect_db/connect_db.php');
//print_r($connect_db_json);
    $connect_db = json_decode($connect_db_json);
    print_r($connect_db);
    //$link = mysqli_connect($connect_db->host, $connect_db->user, $connect_db->pass, $connect_db->base);
    $link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno()) {
      echo "Ошибка подключения к БД: " . mysqli_connect_error();
      exit();
    }
    mysqli_query($link, "set names utf8");                                //УСТАНОВКА КОДИРОВКИ utf8
    $this->link_db = $link;                                                 //ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ В "КЛАССНУЮ" ПЕРЕМЕННУЮ $this->link_db
  }

//----------------------------------------------------------
  function DB_query_oll()
  {                                             // 16. МЕТОД БАЗОВОГО КЛАССА "ВЫПОЛНЕНИЕ ЗАПРОСА+ЗАПИСЬ РЕЗУЛЬТА В МАССИВ"
    $res = mysqli_query($this->link_db, $this->query);                      //ВЫПОЛНЕНИЕ ЗАПРОСА - "КЛАССНАЯ" ПЕРЕМЕННАЯ $this->link_db - ССЫЛКА НА "УДАЧНОЕ" ПОДКЛЮЧЕНИЕ, "КЛАССНАЯ" ПЕРЕМЕННАЯ $this->query - СТРОКА ЗАПРОСА SQL
    while ($row = mysqli_fetch_assoc($res)) {                                //ПЕРЕБОР РЕЗУЛЬТАТА - ПОСТРОЧНО
      $row_oll[] = $row;                                                  //ФОРМИРОВАНИЕ $row_oll(НАКОПЛЕНИЕ ПРИ ПЕРЕБОРЕ) - РЕЗУЛЬТИРУЮЩИЙ ДВУМЕРНЫЙ ДВУМЕРНЫЙ МАССИВ
    }
    $this->row_db = $row_oll;                                               //РЕЗУЛЬТИРУЮЩИЙ ДВУМЕРНЫЙ ДВУМЕРНЫЙ МАССИВ В "КЛАССНУЮ" ПЕРЕМЕННУЮ $this->row_db
  }

//----------------------------------------------------------
  function DB_dom_tag()
  {                                               // 17. МЕТОД БАЗОВОГО КЛАССА "ВЫВОД В DOM"
//...
    if ($_POST['language'] == 'ua') {
      $mas2_str = '';
      foreach ($this->row_db as $k1 => $mas1) {
        foreach ($mas1 as $k2 => $mas2) {
          $mas2_str .= $mas2 . '|';
        }
        $mas2_str .= '|';
      }
      $mas2_str = substr($mas2_str, 0, strlen($mas2_str) - 2);
      print_r($mas2_str);
      echo '<br>';
//...
      //$mas2_ua=$this->yandex_translate_file_get_contents($mas2_str);//не работает на денвере
      $mas2_ua = file_get_contents('http://translate.25one.com.ua/api_yandex_translate_file_get_contents.php?type_translate=uk&russian_sentence=' . urlencode($mas2_str));
//$mas2_ua=$this->yandex_translate_curl($mas2_str);
//$mas2_ua=file_get_contents('http://translate.25one.com.ua/api_yandex_translate_curl.php?type_translate=uk&russian_sentence='.urlencode($mas2_str));
//print_r($mas2_ua); echo '<br>';
//...
      print_r($mas2_ua);
      echo '<br>';
      $mas2_ua_arr1 = explode('||', $mas2_ua);
      foreach ($mas2_ua_arr1 as $k1 => $mas2_ua_arr11) {
        $mas2_ua_arr2 = explode('|', $mas2_ua_arr11);
        foreach ($mas2_ua_arr2 as $k2 => $mas2_ua_arr22) {
          $mas2_ua_new[$k1][$k2] = $mas2_ua_arr22;
        }
      }
//print_r($mas2_ua_new); echo '<br>';
      $this->row_db = $mas2_ua_new;
    }
//...
    $rrr = '';
    foreach ($this->row_db as $k1 => $mas1) {                                //ПЕРЕБОР $this->row_db - ФОРМИРОВАНИЕ СТРОК
      $rr = '';
      foreach ($mas1 as $k2 => $mas2) {
        if ($k2 == 'up') {
          $mas2 = "<a href='#' id='$mas2' style='color:blue;' onclick='return false;'>" . $mas2 . "</a>";
        } //ПРИ КАЖДОМ "НУЛЕВОМ" - В ЯЧЕЙКУ ТАБЛИЦЫ <a> С id=id_user/id_pokup (ДЛЯ select-МЕНЮ(ТОВАРЫ) - ПРОСТО НЕ БУДЕТ РАБОТАТЬ, Т.К. НЕТ $k2=='up')
        $rr = $rr . "$this->tag1$mas2$this->tag11";                         //ОБОРАЧИВАЕМ ТЕГАМИ-1(БУДЕТ ДЛЯ ВСЕХ (select-МЕНЮ(option) И ТАБЛИЦА (td))
      }
      $rrr = $rrr . "$this->tag2$rr$this->tag22";                            //ОБОРАЧИВАЕМ ТЕГАМИ-2(МОГУТ ОТСУТСТВОВАТЬ, НАПРИМЕР, ДЛЯ select-МЕНЮ)
    }
    $rrr = "$this->tag3$rrr$this->tag33";                                   //ОБОРАЧИВАЕМ ТЕГАМИ-3(МОГУТ ОТСУТСТВОВАТЬ, НАПРИМЕР, ДЛЯ ТАБЛИЦЫ, ИСПОЗЬЗУЮТСЯ ДЛЯ <option>Все---</option> - ДЛЯ "ДОБАВКИ ЛИШНЕГО" ПУНКТА МЕНЮ (0-ГО), ПО КОТОРОМУ ВЫБИРАЮТСЯ ВСЕ ЗАПИСИ (СМ.СООТВЕТСТВУЮЩИЙ js-КОД В db_poisk.php (tov_select='';))
    if (isset($_POST['name_select'])) {                                    //ЕСЛИ НАЖАТА КНОПКА "Искать покупку"...
      echo $rrr;                                                         //ВОЗВРАТ ИЗ ajax
    } else {                                                                //ЕСЛИ НЕТ НАЖАТИЯ КНОПКИ "Искать покупку"(ПЕРВАЯ ЗАГРУЗКА!!!)...
      echo '<script>';                                                   //ВОЗВРАТ НЕ!!! ИЗ ajax-ОБЫЧНЫЙ js
      echo "var elem=document.getElementById('$this->id_null');";        //ВЫВОД В КОНКРЕТНЫЙ ЭЛЕМЕНТ $this->id_null(МЕНЮ, ТАБЛИЦА)
      echo 'elem.innerHTML="' . $rrr . '</span>";';
      echo '</script>';
    }
  }

  function api_yandex_translate_file_get_contents($mas2)
  {
//{"var1":"123", "var2":"456"} -  json
    $yandex = json_decode(
      file_get_contents(
        'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151121T123602Z.c647c65268af9cdb.8923072f049a821f33b0ff4fa11ef99285963325&text=' . urlencode($mas2) . '&lang=ru-uk'
      )
    );
    //return $yandex; echo '<br>'; //stdClass Object ( [code] => 200 [lang] => ru-uk [text] => Array ( [0] => Миколаїв ) )
    return $yandex->text[0];
  }

  function api_yandex_translate_curl($mas2)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_URL, 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151121T123602Z.c647c65268af9cdb.8923072f049a821f33b0ff4fa11ef99285963325&text=' . urlencode($mas2) . '&lang=ru-uk');
    $result = curl_exec($ch);
    $yandex = json_decode($result);
    return $yandex->text[0];
  }

  function DB_close()
  {                                                 // 18. МЕТОД БАЗОВОГО КЛАССА "ЗАКРЫТИЕ СОЕДИНЕНИЯ С БД"
    mysqli_close($this->link_db);
  }
//***********************************************************
}

///////////////////////////////////////////////////////////////////
class DB_oll extends DB_class
{                                       // 19. ПРОИЗВОДНЫЙ КЛАСС
  function Query_Dom_oll($link, $query, $id_null, $tag1, $tag11, $tag2, $tag22, $tag3, $tag33)
  { //МЕТОД ПРОИЗВОДНОГО КЛАССА
    $this->link_db = $link;                                                 //"КЛАССНЫЕ" ПЕРЕМЕННЫЕ ДЛЯ НЕОБХОДИМЫХ ТЕГОВ И ЭЛЕМЕНТА "0-ГО" ВЫВОДА...
    $this->query = $query;
    $this->tag1 = $tag1;
    $this->tag11 = $tag11;
    $this->tag2 = $tag2;
    $this->tag22 = $tag22;
    $this->tag3 = $tag3;
    $this->tag33 = $tag33;
    $this->id_null = $id_null;
    $this->DB_query_oll();                                                //НАСЛЕДОВАНИЕ - "ЗАПРОС-МАССИВ"!!!
    $this->DB_dom_tag();                                                  //НАСЛЕДОВАНИЕ - "ТЕГ-DOM"!!!
  }
}

///////////////////////////////////////////////////////////////////

?>
