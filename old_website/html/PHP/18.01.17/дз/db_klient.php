<br>
<div id="klient">
<br>
<div id="klient_korr" style="background-color:gainsboro; margin-left:5%; margin-right:5%; border:1px solid silver; border-radius:4px; text-align:justify; padding:3px;">
<a href="#" style="color:blue; font-weight:bold; font-size:11pt;" onclick="klient_insert();return false;">Добавить</a> нового клиента или <span style="color:teal; font-weight:bold; font-size:11pt;">выберите из таблицы (изменение, удаление)</span>
<form style="margin:0px;">
<input type="hidden" name="klient_id">
<div style"display:table;">
<div style"display:table-raw;">
<div style="display:table-cell; width:70px; float:left;">Клиент </div><div style="display:table-cell; width:360px;"><input type="text" maxlength="50" style="background-color:silver; width:360px;" name="klient_name_pole" onkeypress="if(event.which==13) return false;"></div>
</div>
<div style"display:table-raw;">
<div style="display:table-cell; width:70px; float:left;">Телефон </div><div style="display:table-cell; width:360px;"><input type="text" maxlength="25" style="background-color:silver; width:360px;" name="klient_tel_pole" onkeypress="if(event.which==13) return false;"></div>
</div>
<div style"display:table-raw;">
<div style="display:table-cell; width:70px; float:left;">Адрес </div><div style="display:table-cell; width:360px;"><input type="text" maxlength="50" style="background-color:silver; width:360px;" name="klient_adr_pole" onkeypress="if(event.which==13) return false;"></div>
</div>
</div>
<br>
<input type="button" style="background-color:silver;" name="klient_insert" value="Добавить" onclick="klient_insert_prov(this.name, klient_name_pole.value, klient_tel_pole.value, klient_adr_pole.value);">
<input type="button" style="background-color:silver;" name="klient_update" value="Изменить" onclick="klient_update_knop();">
<input type="button" style="background-color:silver;" name="klient_delete" value="Удалить" onclick="klient_delete_prov(this.name, klient_id.value);">
<br><span id="klient_error" style="color:red;">&nbsp;</span>
</form>
</div>
<div style="margin-right:5%;">
<table style="width:100%; margin-right:15px;">
<tbody>
<tr>
<td style="width:5%; visibility:hidden;"></td>
<td style="width:35%; background-color:silver; text-align:center; font-weight:bold;">Клиент</td>
<td style="width:20%; background-color:silver; text-align:center; font-weight:bold;">Телефон</td>
<td style="width:35%; background-color:silver; text-align:center; font-weight:bold;">Адрес</td>
</tr>
</tbody>
<tbody id="tbody_klient">
</tbody>
</table>
</div>
<br>
</div>
<br>

<script>

document.forms[0].elements[1].disabled=true;
document.forms[0].elements[2].disabled=true;
document.forms[0].elements[3].disabled=true;
document.forms[0].elements[4].disabled=true;
document.forms[0].elements[5].disabled=true;
document.forms[0].elements[6].disabled=true;

function klient_insert() {
    klient_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[2].value='';
    document.forms[0].elements[3].value='';
    document.forms[0].elements[1].disabled=false;
    document.forms[0].elements[2].disabled=false;
    document.forms[0].elements[3].disabled=false;
    document.forms[0].elements[4].disabled=false;
    document.forms[0].elements[1].style.backgroundColor='white';
    document.forms[0].elements[2].style.backgroundColor='white';
    document.forms[0].elements[3].style.backgroundColor='white';
    document.forms[0].elements[4].style.backgroundColor='whitesmoke';
    document.forms[0].elements[5].disabled=true;
    document.forms[0].elements[6].disabled=true;
    document.forms[0].elements[5].style.backgroundColor='silver';
    document.forms[0].elements[6].style.backgroundColor='silver';
    var n_u_k=document.forms[0].elements[5];
    n_u_k.setAttribute('value', 'Изменить');
    n_u_k.setAttribute('onclick', 'klient_update_knop();');
}
function klient_insert_prov(name, pole_name, pole_tel, pole_adr) {
  var priz=0;
  var mas_a=document.getElementById("tbody_klient").getElementsByTagName("td");
  for(var i=0; i<mas_a.length; i++) {
     if(mas_a[i].innerHTML.toLowerCase().indexOf(pole_name.toLowerCase())!=-1) {priz=1;}
  }
  var r_name=/^[а-яэіїєa-z\-\. ]+$/gi;
  var r_tel=/^\(\d{3}\)\d{3}(-\d{2}){2}$/gi;
  var r_adr=/^[а-яэіїєa-z]+$/gi;
  if(pole_name=='' || pole_tel=='' || pole_adr=='' || priz==1) {
    klient_error.innerHTML=" Пустое поле или дублирование пользователя!!! Исправьте!!!";
  }
  else if(!r_name.test(pole_name)) {
    klient_error.innerHTML=" Недопустимые символы!!! См.формат записи для поля 'Клиент'...";
  }
  else if(!r_tel.test(pole_tel)) {
    klient_error.innerHTML=" Недопустимые символы или формат!!! См.формат записи для поля 'Телефон'...";
  }
  else if(!r_adr.test(pole_adr)) {
    klient_error.innerHTML=" Недопустимые символы!!! См.формат записи для поля 'Адрес'...";
  }
  else {
    jquery_send('#tbody_klient', 'post', 'db_all_query.php', [name, 'klient_name_pole', 'klient_tel_pole', 'klient_adr_pole'], ['', pole_name, pole_tel, pole_adr]);
    klient_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[2].value='';
    document.forms[0].elements[3].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[5].disabled=true;
    document.forms[0].elements[6].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
    document.forms[0].elements[5].style.backgroundColor='silver';
    document.forms[0].elements[6].style.backgroundColor='silver';
  }
}
function klient_update_delete(elem) {
   klient_error.innerHTML='&nbsp';
   document.forms[0].elements[1].value='';
   document.forms[0].elements[2].value='';
   document.forms[0].elements[3].value='';
   document.forms[0].elements[1].disabled=true;
   document.forms[0].elements[1].style.backgroundColor='silver';
   document.forms[0].elements[2].disabled=true;
   document.forms[0].elements[2].style.backgroundColor='silver';
   document.forms[0].elements[3].disabled=true;
   document.forms[0].elements[3].style.backgroundColor='silver';
   document.forms[0].elements[4].disabled=true;
   document.forms[0].elements[4].style.backgroundColor='silver';
   document.forms[0].elements[5].disabled=false;
   document.forms[0].elements[5].style.backgroundColor='whitesmoke';
   var n_u_k=document.forms[0].elements[5];
   n_u_k.setAttribute('value', 'Изменить');
   n_u_k.setAttribute('onclick', 'klient_update_knop();');
   document.forms[0].elements[6].disabled=false;
   document.forms[0].elements[6].style.backgroundColor='whitesmoke';
   document.forms[0].elements[0].value=elem.childNodes[0].textContent;
   document.forms[0].elements[1].value=elem.childNodes[1].textContent;
   document.forms[0].elements[2].value=elem.childNodes[2].textContent;
   document.forms[0].elements[3].value=elem.childNodes[3].textContent;
}
function klient_update_knop() {
   document.forms[0].elements[1].disabled=false;
   document.forms[0].elements[1].style.backgroundColor='white';
   document.forms[0].elements[2].disabled=false;
   document.forms[0].elements[2].style.backgroundColor='white';
   document.forms[0].elements[3].disabled=false;
   document.forms[0].elements[3].style.backgroundColor='white';
   document.forms[0].elements[4].disabled=true;
   document.forms[0].elements[4].style.backgroundColor='silver';
   document.forms[0].elements[5].disabled=false;
   document.forms[0].elements[5].style.backgroundColor='whitesmoke';
   document.forms[0].elements[6].disabled=true;
   document.forms[0].elements[6].style.backgroundColor='silver';
   var n_u_k=document.forms[0].elements[5];
   n_u_k.setAttribute('value', 'Сохранить');
   n_u_k.setAttribute('onclick', 'klient_update_prov(this.name, klient_id.value, klient_name_pole.value, klient_tel_pole.value, klient_adr_pole.value);');
}
function klient_update_prov(name, id_pole, pole_name, pole_tel, pole_adr) {
  var r_name=/^[а-яэіїєa-z\-\. ]+$/gi;
  var r_tel=/^\(\d{3}\)\d{3}(-\d{2}){2}$/gi;
  var r_adr=/^[а-яэіїєa-z]+$/gi;
  if(pole_name=='' || pole_tel=='' || pole_adr=='') {
    klient_error.innerHTML=" Пустое поле!!! Исправьте!!!";
  }
  else if(!r_name.test(pole_name)) {
    klient_error.innerHTML=" Недопустимые символы!!! См.формат записи для поля 'Клиент'...";
  }
  else if(!r_tel.test(pole_tel)) {
    klient_error.innerHTML=" Недопустимые символы!!! См.формат записи для поля 'Телефон'...";
  }
  else if(!r_adr.test(pole_adr)) {
    klient_error.innerHTML=" Недопустимые символы!!! См.формат записи для поля 'Адрес'...";
  }
  else {
    jquery_send('#tbody_klient', 'post', 'db_all_query.php', [name, 'id_pole', 'klient_name_pole','klient_tel_pole', 'klient_adr_pole'], ['', id_pole, pole_name, pole_tel, pole_adr]);
    klient_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[2].value='';
    document.forms[0].elements[3].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[5].disabled=true;
    document.forms[0].elements[6].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
    document.forms[0].elements[5].style.backgroundColor='silver';
    document.forms[0].elements[6].style.backgroundColor='silver';
  }
}
function klient_delete_prov(name, id_pole) {
    jquery_send('#tbody_klient', 'post', 'db_all_query.php', [name, 'id_pole'], ['', id_pole]);
    klient_error.innerHTML='&nbsp';
    document.forms[0].elements[1].value='';
    document.forms[0].elements[2].value='';
    document.forms[0].elements[3].value='';
    document.forms[0].elements[1].disabled=true;
    document.forms[0].elements[2].disabled=true;
    document.forms[0].elements[3].disabled=true;
    document.forms[0].elements[4].disabled=true;
    document.forms[0].elements[5].disabled=true;
    document.forms[0].elements[6].disabled=true;
    document.forms[0].elements[1].style.backgroundColor='silver';
    document.forms[0].elements[2].style.backgroundColor='silver';
    document.forms[0].elements[3].style.backgroundColor='silver';
    document.forms[0].elements[4].style.backgroundColor='silver';
    document.forms[0].elements[5].style.backgroundColor='silver';
    document.forms[0].elements[6].style.backgroundColor='silver';
}
function kursor_start(elem) {
    for(var i=0; i<elem.childNodes.length; i++) {
       if(i!=0) {
          elem.childNodes[i].setAttribute("style", "background-color:gainsboro; color:blue;");
       }
    }
}
function kursor_end(elem) {
    for(var i=0; i<elem.childNodes.length; i++) {
       if(i!=0) {
          elem.childNodes[i].setAttribute("style", "background-color:white; color:teal;");
       }
    }
}
</script>

<?php
include_once 'db_all_query.php';                              
?>

