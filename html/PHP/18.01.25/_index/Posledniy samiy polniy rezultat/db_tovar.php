<br>
<div id="tovar">
<div id="left" style="display:none;"></div>
<br>
<div id="tovar_korr" style="background-color:gainsboro; margin-left:5%; margin-right:5%; border:1px solid silver; border-radius:4px; text-align:justify; padding:3px;">
<a href="#" style="color:blue; font-weight:bold; font-size:11pt;" onclick="tov_insert();return false;">Добавить</a> новый товар или <span style="color:teal; font-weight:bold; font-size:11pt;">выберите из таблицы (изменение, удаление)</span>
<form style="margin:0px;">
<input type="hidden" name="tov_id">
<div style"display:table;">
<div style"display:table-raw; height:75px;">
<div style="display:table-cell; width:315px; height:75px; float:left;">
<input type="text" maxlength="50" style="background-color:silver; width:300px;" name="tov_pole" onkeypress="if(event.which==13) return false;">
<input type="button" style="background-color:silver;" name="tov_insert" value="Добавить" onclick="tov_insert_prov(this.name, tov_pole.value);">
<input type="button" style="background-color:silver;" name="tov_update" value="Изменить" onclick="tov_update_knop();">
<input type="button" style="background-color:silver;" name="tov_delete" value="Удалить" onclick="tov_delete_prov(this.name, tov_id.value);">
<br><span id="tov_error" style="color:red;">&nbsp;</span>
</div>
<div id="tovar_img" style="display:table-cell; width:75px; height:75px; border:1px solid teal;">
<img src="" id="tovar_img_img">
</div>
</div>
</div>
</form>
<div style"display:table;">
<div style"display:table-raw;">
<div style="display:table-cell; width:300px;">
&nbsp;
</div>
<div style="display:table-cell; width:75px; padding-left:15px;">
<div style="position:relative; width:75px; height:16px;">
<div style="position:absolute; width:75px; height:16px; border:1px solid silver; border-radius:4px; z-index:0; text-align:center; background-color:teal; color:white; font-size:8pt; font-family:arial;">
<span id="knop_izobr">Изображение</span>
</div>
<form name="forup_name" method="post" enctype="multipart/form-data" target="ifr" action="up.php">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="userfile" class="fil" onchange="forup();">
<input type="submit" value="Записать" class="sub">
</form>
<script>
function forup() {
forup_name.submit();
loa();
}
function loa() {
var img_tovar_tmp=window.parent.document.getElementById("tovar_img_img");
img_tovar_tmp.setAttribute("style", "width:75px; height:75px;");
img_tovar_tmp.setAttribute("src", "load.gif");
}
</script>
</div>
</div>
</div>
</div>
<iframe name="ifr" style="display:none;"></iframe>
</div>
<table style="width:100%;">
<tbody>
<tr>
<td style="width:5%; visibility:hidden;"></td>
<td style="background-color:silver; text-align:center; font-weight:bold;">Товар</td>
<td style="width:75px; background-color:silver; text-align:center; font-weight:bold;">Вид</td>
<td style="width:5%; visibility:hidden;"></td>
</tr>
</tbody>
<tbody id="tbody_tovar">
</tbody>
</table>
<br>
</div>
<br>

<script>
                                                 // !!! 6. js-СКРИПТЫ ПРОВЕРКИ «НА ПУСТОТУ», «НА ДУБЛИ» + АКТИВАЦИЯ/ДЕАКТИВАЦИЯ и СМЕНА ФОНА ЭЛЕМЕНТОВ ФОРМЫ ПРИ КОНКРЕТНОМ ВЫБОРЕ + ВЫЗОВ ajax-ФУНКЦИИ С ПЕРЕДАЧЕЙ ЕЙ НЕОБХОДИМЫХ ПАРАМЕТРОВ ИЗ ФОРМЫ (jquery_send, т.к. НУЖНО БУДЕТ «ТЯНУТЬ» ИСПОЛЬНЯЕМЫЙ js)
document.forms[0].elements[1].disabled=true;     // !!! При этом, в ajax ПЕРЕДАЕТСЯ name КНОПКИ (СООТВЕТСТВУЮЩИЙ $_POST ОТСЛЕЖИВАЕТСЯ ДАЛЕЕ В db_all_query.php) И НЕОБХОДИМЫЕ ПАРАМЕТРЫ ИЗ ПОЛЕЙ ФОРМЫ...
document.forms[0].elements[2].disabled=true;
document.forms[0].elements[3].disabled=true;
document.forms[0].elements[4].disabled=true;
document.forms['forup_name'].elements[0].disabled=true;
document.forms['forup_name'].elements[1].disabled=true;
knop_izobr.setAttribute('style', 'opacity:0.5;');

function tov_insert() {
    tov_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[1].disabled=false;
    document.forms[0].elements[2].disabled=false;
    document.forms[0].elements[1].style.backgroundColor='white';
    document.forms[0].elements[2].style.backgroundColor='whitesmoke';
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
    var t_u_k=document.forms[0].elements[3];
    t_u_k.setAttribute('value', 'Изменить');
    t_u_k.setAttribute('onclick', 'tov_update_knop();');
document.forms['forup_name'].elements[0].disabled=false;
document.forms['forup_name'].elements[1].disabled=false;
knop_izobr.setAttribute('style', 'opacity:1.0;');
var tov_imgg=document.getElementById('tovar_img_img');
tov_imgg.setAttribute("src", "");
tov_imgg.setAttribute("style", "opacity:1.0;");

}
function tov_insert_prov(name, pole) {
  var priz=0;
  var mas_a=document.getElementById("tbody_tovar").getElementsByTagName("td");
  for(var i=0; i<mas_a.length; i++) {
     if(mas_a[i].innerHTML.toLowerCase()==pole.toLowerCase()) {priz=1;}
  }
  if(pole!='' && priz==0) {
    var tov_imgg=document.getElementById('tovar_img_img');
    var tov_imggg=tov_imgg.getAttribute('src');
    jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'tov_pole', 'tov_img'], ['', pole, tov_imggg]);    // !!! ...ПРИ insert В ajax ПЕРЕДАЕТСЯ ОДИН ПАРАМЕТР – ДОБАВЛЯЕМЫЙ ТОВАР, НЕОБХОДИМОСТИ В ПЕРЕДАЧЕ ВТОРОГО ПАРАМЕТРА (id_tovar) НЕТ – ПОЛЕ «A-I» - ДОБАВЛЯЕТСЯ САМ…
    tov_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
document.forms['forup_name'].elements[0].disabled=true;
document.forms['forup_name'].elements[1].disabled=true;
knop_izobr.setAttribute('style', 'opacity:0.5;');
tov_imgg.setAttribute("src", "");
  }
  else {
    tov_error.innerHTML=" Пустое поле или дублирование товара!!! Исправьте!!!";
  }
}
function tov_update_delete(elem) {
   tov_error.innerHTML='&nbsp';
   document.forms[0].elements[1].value='';
   document.forms[0].elements[1].disabled=true;
   document.forms[0].elements[1].style.backgroundColor='silver';
   document.forms[0].elements[2].disabled=true;
   document.forms[0].elements[2].style.backgroundColor='silver';
   document.forms[0].elements[3].disabled=false;
   document.forms[0].elements[3].style.backgroundColor='whitesmoke';
   var t_u_k=document.forms[0].elements[3];
   t_u_k.setAttribute('value', 'Изменить');
   t_u_k.setAttribute('onclick', 'tov_update_knop();');
   document.forms[0].elements[4].disabled=false;
   document.forms[0].elements[4].style.backgroundColor='whitesmoke';
   document.forms[0].elements[0].value=elem.childNodes[0].textContent;
   document.forms[0].elements[1].value=elem.childNodes[1].textContent;
   var tov_imgg=document.getElementById('tovar_img_img');
   tov_imgg.setAttribute('src', elem.childNodes[2].childNodes[0].getAttribute('src'));  //«0-Й РЕБЕНОК» В «3-М РЕБЕНКЕ» ТАБЛИЦЫ («ЩЕЛЧОК») – ЭТО img (НУЖЕН ЕГО src)
   tov_imgg.setAttribute('style', 'opacity:0.5;');  //«ЗАКРЫТИЕ» ВОЗМОЖНОСТИ «ПЕРЕВЫБОРА» ИЗОБРАЖЕНИЯ (ПОКА)
   document.forms['forup_name'].elements[0].disabled=true;
   document.forms['forup_name'].elements[1].disabled=true;
   knop_izobr.setAttribute('style', 'opacity:0.5;');
}
function tov_update_knop() {
   document.forms[0].elements[1].disabled=false;
   document.forms[0].elements[1].style.backgroundColor='white';
   document.forms[0].elements[2].disabled=true;
   document.forms[0].elements[2].style.backgroundColor='silver';
   document.forms[0].elements[3].disabled=false;
   document.forms[0].elements[3].style.backgroundColor='whitesmoke';
   document.forms[0].elements[4].disabled=true;
   document.forms[0].elements[4].style.backgroundColor='silver';
   var t_u_k=document.forms[0].elements[3];
   t_u_k.setAttribute('value', 'Сохранить');
   t_u_k.setAttribute('onclick', 'tov_update_prov(this.name, tov_id.value, tov_pole.value);');
   document.forms['forup_name'].elements[0].disabled=false; // «ОТКРЫТИЕ» ИЗОБРАЖЕНИЯ ДЛЯ КОРРЕКТИРОВКИ
   document.forms['forup_name'].elements[1].disabled=false;
   knop_izobr.setAttribute('style', 'opacity:1.0;');
   var tov_imgg=document.getElementById('tovar_img_img');
   tov_imgg.setAttribute('style', 'opacity:1.0;');
}
function tov_update_prov(name, id_pole, tov_pole) {
    var tov_imgg=document.getElementById('tovar_img_img');
    var tov_imggg=tov_imgg.getAttribute('src');
  if(tov_pole!='') {
    jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'id_pole', 'tov_pole', 'tov_img'], ['', id_pole, tov_pole, tov_imggg]);   //!!! ...ПРИ update В ajax ПЕРЕДАЕТСЯ ДВА ПАРАМЕТРА – ОТКОРРЕКТИРОВАННЫЙ ТОВАР + id_tovar,  ПО КОТОРОМУ (через where) БУДЕТ ПРОВОДИТЬСЯ КОРРЕКТИРОВКА…
    tov_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
   tov_imgg.setAttribute("src", "");  //«ЗАКРЫТИЕ» И «ОЧИСТКА» ПОСЛЕ КОРРЕКТИРОВКИ
   document.forms['forup_name'].elements[0].disabled=true;
   document.forms['forup_name'].elements[1].disabled=true;
   knop_izobr.setAttribute('style', 'opacity:0.5;');
  }
  else {
    tov_error.innerHTML=" Пустое поле!!! Исправьте!!!";
  }
}
function tov_delete_prov(name, id_pole) {
    var tov_imgg=document.getElementById('tovar_img_img');
    var tov_imggg=tov_imgg.getAttribute('src');
    jquery_send('#tbody_tovar', 'post', 'db_all_query.php', [name, 'id_pole', 'tov_img'], ['', id_pole, tov_imggg]);   //!!! ...ПРИ delete В ajax ПЕРЕДАЕТСЯ ОДИН ПАРАМЕТР – id_tovar, НЕОБХОДИМОСТИ В ПЕРЕДАЧЕ ВТОРОГО ПАРАМЕТРА (tov) НЕТ – СООТВЕТСТВУЮШЕЕ ПОЛЕ ФОРМЫ ХОТЬ ЕГО «СПРАВОЧНО» ОТОБРАЖАЕТ, НО ДЕАКТИВИРОВАНО (ИСПРАВИТЬ НЕТ ВОЗМОЖНОСТИ)…
    tov_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
    tov_imgg.setAttribute("src", "");  //УДАЛЕНИЕ ИЗ ОКНА
}
function kursor_start(elem) {                                 //!!! …+ ЕЩЕ js-СКРИПТ «ПОДСВЕТКА» ЯЧЕЙКИ С ВЫБРАННЫМ ТОВАРОМ
    elem.style.backgroundColor="gainsboro";
    elem.style.color="blue";
}
function kursor_end(elem) {
    elem.style.backgroundColor="white";
    elem.style.color="teal";
}
</script>

<?php
include_once 'db_all_query.php';                              // !!! 7. php-СКРИПТ "0"-ГО (НАЧАЛЬНОГО) ВЫВОДА
?>

