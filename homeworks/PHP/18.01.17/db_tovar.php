<br>
<div id="tovar">
  <!-- !!! 2. .«html-КАРКАС» - ФОРМА (ПОЛЕ + 3-РИ КНОПКИ (ДОБАВЛЕНИЕ(insert), КОРРЕКТИРОВКА(update), УДАЛЕНИЕ(delete)) -->
  <br>
  <div id="tovar_korr"
       style="background-color:gainsboro; margin-left:6%; margin-right:6%; border:1px solid silver; border-radius:4px; text-align:justify; padding:3px;">
    <a href="#" style="color:blue; font-weight:bold; font-size:11pt;" onclick="tov_insert();return false;">Добавить</a>
    новый товар или <span style="color:teal; font-weight:bold; font-size:11pt;">выберите из таблицы (изменение, удаление)</span>
    <form style="margin:0px;">
      <!-- !!! ПОЛЕ ТИПА  hidden (НЕОБХОДИМОСТИ В ЕГО ОТОБРАЖЕНИИ НЕТ) БУДЕТ НЕОБХОДИМО ДЛЯ СОХРАНЕНИЯ id_tovar -->
      <!--<input type="hidden" name="tov_id">-->
      <input name="tov_id">
      <!-- !!! 3. На КАЖДУЮ КНОПКУ формы «ВЕШАЕТСЯ» ПРЕДВАРИТЕЛЬНАЯ (ПЕРЕД ajax) js-onclick-ОБРАБОТКА (ПРОВЕРКА ВВЕДЕННОЙ ИНФОРМАЦИИИ и ИЗМЕНЕНИЕ СТИЛЕЙ ЭЛЕМЕНТОВ ФОРМЫ (АКТИВАЦИЯ/ДЕАКТИВАЦИЯ, ФОН)) -->
      <input type="text" style="background-color:silver; width:100%;" name="tov_pole"
             onkeypress="if(event.which==13) return false;">
      <input type="button" style="background-color:silver;" name="tov_insert" value="Добавить"
             onclick="tov_insert_prov(this.name, tov_pole.value);">
      <input type="button" style="background-color:silver;" name="tov_update" value="Изменить"
             onclick="tov_update_knop();">
      <input type="button" style="background-color:silver;" name="tov_delete" value="Удалить"
             onclick="tov_delete_prov(this.name, tov_id.value);">
      <br><span id="tov_error" style="color:red;">&nbsp;</span>
    </form>
  </div>
  <div style="margin-right:5%;">
    <table style="width:100%; margin-right:15px;">
      <tbody>
      <tr>
        <td style="width:5%; visibility:hidden;"></td>
        <!-- !!! 4. ТАБЛИЦА будет иметь ДВА ПОЛЯ (id_tovar (БУДЕТ «НЕВИДИМЫМ» (visibility:hidden;), НЕОБХОДИМО ДЛЯ update-delete where id_tovar) и tov (НЕПОСРЕДСТВЕННО – ОТОБРАЖЕНИЕ ТОВАРА)) -->
        <td style="width:90%; background-color:silver; text-align:center; font-weight:bold;">Наименование</td>
      </tr>
      </tbody>
      <tbody id="tbody_tovar">                <!-- !!! 5. «ПУСТОЕ» tbody «ajax-ПРИЕМА» -->
      </tbody>
    </table>
  </div>
  <br>
</div>
<br>

<script>
  // !!! 6. js-СКРИПТЫ ПРОВЕРКИ «НА ПУСТОТУ», «НА ДУБЛИ» + АКТИВАЦИЯ/ДЕАКТИВАЦИЯ и СМЕНА ФОНА ЭЛЕМЕНТОВ ФОРМЫ ПРИ КОНКРЕТНОМ ВЫБОРЕ + ВЫЗОВ ajax-ФУНКЦИИ С ПЕРЕДАЧЕЙ ЕЙ НЕОБХОДИМЫХ ПАРАМЕТРОВ ИЗ ФОРМЫ (jquery_send, т.к. НУЖНО БУДЕТ «ТЯНУТЬ» ИСПОЛЬНЯЕМЫЙ js)
  document.forms[0].elements[1].disabled = true;     // !!! При этом, в ajax ПЕРЕДАЕТСЯ name КНОПКИ (СООТВЕТСТВУЮЩИЙ $_POST ОТСЛЕЖИВАЕТСЯ ДАЛЕЕ В db_all_query.php) И НЕОБХОДИМЫЕ ПАРАМЕТРЫ ИЗ ПОЛЕЙ ФОРМЫ...
  document.forms[0].elements[2].disabled = true;
  document.forms[0].elements[3].disabled = true;
  document.forms[0].elements[4].disabled = true;

  function tov_insert() {
    tov_error.innerHTML = '&nbsp';
    document.forms[0].elements[1].value = '';
    document.forms[0].elements[1].disabled = false;
    document.forms[0].elements[2].disabled = false;
    document.forms[0].elements[1].style.backgroundColor = 'white';
    document.forms[0].elements[2].style.backgroundColor = 'whitesmoke';
    document.forms[0].elements[3].disabled = true;
    document.forms[0].elements[4].disabled = true;
    document.forms[0].elements[3].style.backgroundColor = 'silver';
    document.forms[0].elements[4].style.backgroundColor = 'silver';
    var t_u_k = document.forms[0].elements[3];
    t_u_k.setAttribute('value', 'Изменить');
    t_u_k.setAttribute('onclick', 'tov_update_knop();');
  }
  function tov_insert_prov(name, pole) {
    var priz = 0;
    var mas_a = document.getElementById("tbody_tovar").getElementsByTagName("td");
    for (var i = 0; i < mas_a.length; i++) {
      if (mas_a[i].innerHTML.toLowerCase() == pole.toLowerCase()) {
        priz = 1;
      }
    }
    if (pole != '' && priz == 0) {                                     // !!! ...
      jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'tov_pole'], ['', pole]);    // !!! ...ПРИ insert В ajax ПЕРЕДАЕТСЯ ОДИН ПАРАМЕТР – ДОБАВЛЯЕМЫЙ ТОВАР, НЕОБХОДИМОСТИ В ПЕРЕДАЧЕ ВТОРОГО ПАРАМЕТРА (id_tovar) НЕТ – ПОЛЕ «A-I» - ДОБАВЛЯЕТСЯ САМ…
      tov_error.innerHTML = '&nbsp';
      document.forms[0].elements[1].value = '';
      document.forms[0].elements[1].disabled = true;
      document.forms[0].elements[2].disabled = true;
      document.forms[0].elements[3].disabled = true;
      document.forms[0].elements[4].disabled = true;
      document.forms[0].elements[1].style.backgroundColor = 'silver';
      document.forms[0].elements[2].style.backgroundColor = 'silver';
      document.forms[0].elements[3].style.backgroundColor = 'silver';
      document.forms[0].elements[4].style.backgroundColor = 'silver';
    }
    else {
      tov_error.innerHTML = " Пустое поле или дублирование товара!!! Исправьте!!!";
    }
  }
  function tov_update_delete(elem) {
    tov_error.innerHTML = '&nbsp';
    document.forms[0].elements[1].value = '';
    document.forms[0].elements[1].disabled = true;
    document.forms[0].elements[1].style.backgroundColor = 'silver';
    document.forms[0].elements[2].disabled = true;
    document.forms[0].elements[2].style.backgroundColor = 'silver';
    document.forms[0].elements[3].disabled = false;
    document.forms[0].elements[3].style.backgroundColor = 'whitesmoke';
    var t_u_k = document.forms[0].elements[3];
    t_u_k.setAttribute('value', 'Изменить');
    t_u_k.setAttribute('onclick', 'tov_update_knop();');
    document.forms[0].elements[4].disabled = false;
    document.forms[0].elements[4].style.backgroundColor = 'whitesmoke';
    document.forms[0].elements[0].value = elem.childNodes[0].textContent;
    document.forms[0].elements[1].value = elem.childNodes[1].textContent;
  }
  function tov_update_knop() {
    document.forms[0].elements[1].disabled = false;
    document.forms[0].elements[1].style.backgroundColor = 'white';
    document.forms[0].elements[2].disabled = true;
    document.forms[0].elements[2].style.backgroundColor = 'silver';
    document.forms[0].elements[3].disabled = false;
    document.forms[0].elements[3].style.backgroundColor = 'whitesmoke';
    document.forms[0].elements[4].disabled = true;
    document.forms[0].elements[4].style.backgroundColor = 'silver';
    var t_u_k = document.forms[0].elements[3];
    t_u_k.setAttribute('value', 'Сохранить');
    t_u_k.setAttribute('onclick', 'tov_update_prov(this.name, tov_id.value, tov_pole.value);');
  }
  function tov_update_prov(name, id_pole, tov_pole) {
    if (tov_pole != '') {
      jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'id_pole', 'tov_pole'], ['', id_pole, tov_pole]);   //!!! ...ПРИ update В ajax ПЕРЕДАЕТСЯ ДВА ПАРАМЕТРА – ОТКОРРЕКТИРОВАННЫЙ ТОВАР + id_tovar,  ПО КОТОРОМУ (через where) БУДЕТ ПРОВОДИТЬСЯ КОРРЕКТИРОВКА…
      tov_error.innerHTML = '&nbsp';
      document.forms[0].elements[1].value = '';
      document.forms[0].elements[1].disabled = true;
      document.forms[0].elements[2].disabled = true;
      document.forms[0].elements[3].disabled = true;
      document.forms[0].elements[4].disabled = true;
      document.forms[0].elements[1].style.backgroundColor = 'silver';
      document.forms[0].elements[2].style.backgroundColor = 'silver';
      document.forms[0].elements[3].style.backgroundColor = 'silver';
      document.forms[0].elements[4].style.backgroundColor = 'silver';
    }
    else {
      tov_error.innerHTML = " Пустое поле!!! Исправьте!!!";
    }
  }
  function tov_delete_prov(name, id_pole) {
    jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'id_pole'], ['', id_pole]);   //!!! ...ПРИ delete В ajax ПЕРЕДАЕТСЯ ОДИН ПАРАМЕТР – id_tovar, НЕОБХОДИМОСТИ В ПЕРЕДАЧЕ ВТОРОГО ПАРАМЕТРА (tov) НЕТ – СООТВЕТСТВУЮШЕЕ ПОЛЕ ФОРМЫ ХОТЬ ЕГО «СПРАВОЧНО» ОТОБРАЖАЕТ, НО ДЕАКТИВИРОВАНО (ИСПРАВИТЬ НЕТ ВОЗМОЖНОСТИ)…
    tov_error.innerHTML = '&nbsp';
    document.forms[0].elements[1].value = '';
    document.forms[0].elements[1].disabled = true;
    document.forms[0].elements[2].disabled = true;
    document.forms[0].elements[3].disabled = true;
    document.forms[0].elements[4].disabled = true;
    document.forms[0].elements[1].style.backgroundColor = 'silver';
    document.forms[0].elements[2].style.backgroundColor = 'silver';
    document.forms[0].elements[3].style.backgroundColor = 'silver';
    document.forms[0].elements[4].style.backgroundColor = 'silver';
  }
  function kursor_start(elem) {                                 //!!! …+ ЕЩЕ js-СКРИПТ «ПОДСВЕТКА» ЯЧЕЙКИ С ВЫБРАННЫМ ТОВАРОМ
    elem.style.backgroundColor = "gainsboro";
    elem.style.color = "blue";
  }
  function kursor_end(elem) {
    elem.style.backgroundColor = "white";
    elem.style.color = "teal";
  }
</script>

<?php
include_once 'db_all_query.php';                              // !!! 7. php-СКРИПТ "0"-ГО (НАЧАЛЬНОГО) ВЫВОДА
?>