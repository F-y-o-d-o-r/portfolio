<br>
<div id="pokup">
<div id="left" style="display:none;"></div>
<br>
<div id="tovar_korr" style="background-color:gainsboro; margin-left:5%; margin-right:5%; border:1px solid silver; border-radius:4px; text-align:justify; padding:3px;">
<span style="color:teal; font-weight:bold; font-size:11pt;">Добавить новую покупку</span><span style="color:teal; font-weight:normal; font-size:11pt;"> - выберите <span style="font-weight:bold;">клиента</span>, <span style="font-weight:bold;">товар</span> и <span style="font-weight:bold;">дату</span></span>
<form name="form_pokup" style="margin:0px;">

<span id="name_id" style="display:none;"></span>
<span id="tov_id" style="display:none;"></span>
<br>

<div style"display:table;">
<div style="border:1px solid silver; border-radius:4px;">
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">Клиент </div><div style="display:table-cell; width:360px;">
<select name="sel_name_pokup" id="sel_name_id_pokup" onchange="cng_name();" style="width:219px;" onkeypress="if(event.which==13) {return false;}">
</select></div>
</div>
<br>
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">&nbsp; </div><div style="display:table-cell; width:360px;">
<div style="background-color:silver; width:219px; height:20px;" id="tel_pole_pokup_id"></div>
</div>
</div>
<br>
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">&nbsp; </div><div style="display:table-cell; width:360px;">
<div style="background-color:silver; width:219px; height:20px;" id="adr_pole_pokup_id"></div>
</div>
</div>
</div>
<script>
function cng_name() {
    pokup_error.innerHTML="&nbsp";
    name_pokup_select=form_pokup.sel_name_pokup.options[form_pokup.sel_name_pokup.selectedIndex].text;
    if(form_pokup.sel_tov_pokup.selectedIndex!=0 && form_pokup.sel_name_pokup.selectedIndex!=0) {
       maska.style.zIndex=-1;
       form_pokup.elements[5].style.backgroundColor='whitesmoke';    //ОТКРЫТИЕ КНОПКИ
       form_pokup.elements[5].disabled=false;
    }
    else {
       maska.style.zIndex=1;
       form_pokup.elements[5].style.backgroundColor='silver';        //ЗАКРЫТИЕ КНОПКИ
       form_pokup.elements[5].disabled=true;
    }
    jquery_send('#left', 'post', 'db_all_query.php', ['name_pokup_select'], [name_pokup_select]);
}
</script>
<br>
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">Товар </div><div style="display:table-cell; width:219px; float:left;">
<select name="sel_tov_pokup" id="sel_tov_id_pokup" onchange="cng_tov();" style="width:219px;" onkeypress="if(event.which==13) {return false;}">
</select></div>
<div id="pokup_img" style="display:table-cell; width:75px; height:75px; float:right; margin-right:25px; border:1px solid teal;">
</div>
</div>
<script>
function cng_tov() {
    pokup_error.innerHTML="&nbsp";
    tov_pokup_select=form_pokup.sel_tov_pokup.options[form_pokup.sel_tov_pokup.selectedIndex].text;
    if(form_pokup.sel_tov_pokup.selectedIndex!=0 && form_pokup.sel_name_pokup.selectedIndex!=0) {
       maska.style.zIndex=-1;
       form_pokup.elements[5].style.backgroundColor='whitesmoke';   //ОТКРЫТИЕ КНОПКИ
       form_pokup.elements[5].disabled=false;
    }
    else {
       maska.style.zIndex=1;
       form_pokup.elements[5].style.backgroundColor='silver';       //ЗАКРЫТИЕ КНОПКИ
       form_pokup.elements[5].disabled=true;
    }
    jquery_send('#left', 'post', 'db_all_query.php', ['tov_pokup_select'], [tov_pokup_select]);
}
</script>
<br>
<br>
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">Дата покупки </div><div style="display:table-cell; width:360px;">

<select name="day_pokup" id="day_pokup_id">
</select>
<select name="month_pokup" id="month_pokup_id">
</select>
<select name="yar_pokup" id="yar_pokup_id">
</select>

</div>
</div>
</div>
<br>
<div id="maska" style="width:70px; height:22px; position:absolute; z-index:1;" onmouseover="pokup_insert_naved();" onmouseout="pokup_error.innerHTML='&nbsp';;">
</div>
<input type="button" style="background-color:silver;" name="pokup_insert" value="Добавить" onclick="pokup_insert_go(this.name);">

<br><span id="pokup_error" style="color:red;">&nbsp;</span>
</form>
</div>
<br>
</div>
<br>


<script>
form_pokup.elements[5].style.backgroundColor='silver';
form_pokup.elements[5].disabled=true;
function pokup_insert_naved() {
if(form_pokup.sel_name_pokup.selectedIndex==0 || form_pokup.sel_tov_pokup.selectedIndex==0) {
   pokup_error.innerHTML=" Не выбран 'Клиент' или 'Товар'!!! Исправьте!!!";
}
}
function pokup_insert_go(name) {
    var dat_pokup_ins=form_pokup.yar_pokup.options[form_pokup.yar_pokup.selectedIndex].text+'-'+form_pokup.month_pokup.options[form_pokup.month_pokup.selectedIndex].text+'-'+form_pokup.day_pokup.options[form_pokup.day_pokup.selectedIndex].text;
    jquery_send('#left', 'post', 'db_all_query.php', [name, 'name_id', 'tov_id', 'dat_pokup_ins'], ['', name_id.innerHTML, tov_id.innerHTML, dat_pokup_ins]);
}
</script>

<?php
include_once 'db_all_query.php';                              
?>

<script>

</script>
