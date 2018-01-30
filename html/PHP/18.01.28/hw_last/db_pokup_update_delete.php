<br>
<div id="pokup_update_delete">
  <div id="left" style="display:none;"></div>
  <br>
  <div id="tovar_korr"
       style="background-color:gainsboro; margin-left:5%; margin-right:5%; border:1px solid silver; border-radius:4px; text-align:justify; padding:3px;">
    <span style="color:teal; font-weight:bold; font-size:11pt;">Откорректировать</span><span
        style="color:teal; font-weight:normal; font-size:11pt;"> или </span><span
        style="font-weight:bold;">удалить</span> <span style="font-weight:normal;">покупку.</span>
    <form name="form_pokup" style="margin:0px;">

      <span id="name_id" style="display:none;"></span>
      <span id="tov_id" style="display:none;"></span>
      <span id="pok_id" style="display:none;"></span>
      <br>

      <div style
      "display:table;">
      <div style="border:1px solid silver; border-radius:4px;">
        <div style
        "display:table-raw;">
        <div style="display:table-cell; width:100px; float:left;">Клиент</div>
        <div style="display:table-cell; width:360px;">
          <select name="sel_name_pokup" id="sel_name_id_pokup" onchange="cng_name();" style="width:219px;"
                  onkeypress="if(event.which==13) {return false;}">
          </select></div>
      </div>
      <br>
      <div style
      "display:table-raw;">
      <div style="display:table-cell; width:100px; float:left;">&nbsp;</div>
      <div style="display:table-cell; width:360px;">
        <div style="background-color:silver; width:219px; height:20px;" id="tel_pole_pokup_id"></div>
      </div>
  </div>
  <br>
  <div style
  "display:table-raw;">
  <div style="display:table-cell; width:100px; float:left;">&nbsp;</div>
  <div style="display:table-cell; width:360px;">
    <div style="background-color:silver; width:219px; height:20px;" id="adr_pole_pokup_id"></div>
  </div>
</div>
</div>
<script>
  function cng_name() {
    pokup_error.innerHTML = "&nbsp";
    name_pokup_select = form_pokup.sel_name_pokup.options[form_pokup.sel_name_pokup.selectedIndex].text;
    jquery_send('#left', 'post', 'db_all_query.php', ['name_pokup_select'], [name_pokup_select]);
  }
</script>
<br>
<div style"display:table-raw;">

<div style="display:table-cell; width:100px; float:left;">Товар</div>
<div style="display:table-cell; width:219px; float:left;">
  <select name="sel_tov_pokup" id="sel_tov_id_pokup" onchange="cng_tov();" style="width:219px;"
          onkeypress="if(event.which==13) {return false;}">
  </select></div>
<div id="pokup_img"
     style="display:table-cell; width:75px; height:75px; float:right; margin-right:25px; border:1px solid teal;">
</div>
</div>
<script>
  function cng_tov() {
    pokup_error.innerHTML = "&nbsp";
    tov_pokup_select = form_pokup.sel_tov_pokup.options[form_pokup.sel_tov_pokup.selectedIndex].text;
    jquery_send('#left', 'post', 'db_all_query.php', ['tov_pokup_select'], [tov_pokup_select]);
  }
</script>
<br>
<br>
<div style"display:table-raw;">
<div style="display:table-cell; width:100px; float:left;">Дата покупки</div>
<div style="display:table-cell; width:360px;">

  <select name="day_pokup" id="day_pokup_id" onkeypress="if(event.which==13) {return false;}">
  </select>
  <select name="month_pokup" id="month_pokup_id" onkeypress="if(event.which==13) {return false;}">
  </select>
  <select name="yar_pokup" id="yar_pokup_id" onkeypress="if(event.which==13) {return false;}">
  </select>

</div>
</div>
</div>
<br>
<input type="button" style="background-color:whitesmoke;" name="pokup_update" value="Изменить"
       onclick="pokup_update_prover(this.name);">
<input type="button" style="background-color:whitesmoke;" name="pokup_delete" value="Удалить"
       onclick="pokup_delete_go(this.name);">

<br><span id="pokup_error" style="color:red;">&nbsp;</span>
</form>
</div>
<br>
</div>
<br>


<script>
  function pokup_update_prover(name) {
    form_pokup.elements[0].style.backgroundColor = 'white';
    form_pokup.elements[0].disabled = false;
    form_pokup.elements[1].style.backgroundColor = 'white';
    form_pokup.elements[1].disabled = false;
    form_pokup.elements[2].style.backgroundColor = 'white';
    form_pokup.elements[2].disabled = false;
    form_pokup.elements[3].style.backgroundColor = 'white';
    form_pokup.elements[3].disabled = false;
    form_pokup.elements[4].style.backgroundColor = 'white';
    form_pokup.elements[4].disabled = false;
    form_pokup.elements[5].style.backgroundColor = 'whitesmoke';
    form_pokup.elements[5].disabled = false;
    var p_u_k = form_pokup.elements[5];
    p_u_k.setAttribute('value', 'Сохранить');
    p_u_k.setAttribute('onclick', 'pokup_update_go(this.name);');
    form_pokup.elements[6].style.backgroundColor = 'silver';
    form_pokup.elements[6].disabled = true;
    pokup_img_okno.style.opacity = 1.0;
  }
  function pokup_update_go(name) {
    var dat_day_new, dat_month_new, dat_yar_new, dat_new_go;
    for (var i = 0; i < form_pokup.day_pokup.options.length; i++) {
      if (form_pokup.day_pokup.options[i].selected == true) {
        dat_day_new = form_pokup.day_pokup.options[i].text;
      }
    }
    for (var i = 0; i < form_pokup.month_pokup.options.length; i++) {
      if (form_pokup.month_pokup.options[i].selected == true) {
        dat_month_new = form_pokup.month_pokup.options[i].text;
      }
    }
    for (var i = 0; i < form_pokup.yar_pokup.options.length; i++) {
      if (form_pokup.yar_pokup.options[i].selected == true) {
        dat_yar_new = form_pokup.yar_pokup.options[i].text;
      }
    }
    dat_new_go = dat_yar_new + '-' + dat_month_new + '-' + dat_day_new;
    jquery_send('#left', 'post', 'db_all_query.php', [name, 'pok_id', 'name_id_new', 'tov_id_new', 'dat_new'], ['', pok_id.innerHTML, name_id.innerHTML, tov_id.innerHTML, dat_new_go]);
  }
  function pokup_delete_go(name) {
    jquery_send('#left', 'post', 'db_all_query.php', [name, 'pok_id'], ['', pok_id.innerHTML]);
  }
</script>

<?php
include_once 'db_all_query.php';
?>


<script>
  name_id.innerHTML = '<?php echo $obj->row_db[0]['id_use']; ?>';
  tel_pole_pokup_id.innerHTML = '<?php echo $obj->row_db[0]['tel']; ?>';
  adr_pole_pokup_id.innerHTML = '<?php echo $obj->row_db[0]['adr']; ?>';
  pokup_img.innerHTML = '<img id="pokup_img_okno" style="opacity:0.5;" src="' + '<?php echo $obj->row_db[0]['image']; ?>' + '">';
  tov_id.innerHTML = '<?php echo $obj->row_db[0]['id_tov']; ?>';
  pok_id.innerHTML = '<?php echo $obj->row_db[0]['id_pok']; ?>';

  for (var i = 0; i < form_pokup.sel_name_pokup.options.length; i++) {
    if (form_pokup.sel_name_pokup.options[i].text == '<?php echo $obj->row_db[0]['name']; ?>') {
      form_pokup.sel_name_pokup.options[i].selected = true;
    }
  }
  for (var i = 0; i < form_pokup.sel_tov_pokup.options.length; i++) {
    //
    if (form_pokup.sel_tov_pokup.options[i].text.indexOf("'") != -1) {
      var tov_text = form_pokup.sel_tov_pokup.options[i].text.replace(/'/g, '');
    }
    else {
      var tov_text = form_pokup.sel_tov_pokup.options[i].text;
    }
    //
    if (tov_text == '<?php echo $obj->row_db[0]['tov']; ?>') {
      form_pokup.sel_tov_pokup.options[i].selected = true;
    }
  }
  for (var i = 0; i < form_pokup.day_pokup.options.length; i++) {
    if (form_pokup.day_pokup.options[i].text == '<?php echo $obj->row_db[0]['day_substr']; ?>') {
      form_pokup.day_pokup.options[i].selected = true;
    }
  }
  for (var i = 0; i < form_pokup.month_pokup.options.length; i++) {
    if (form_pokup.month_pokup.options[i].text == '<?php echo $obj->row_db[0]['month_substr']; ?>') {
      form_pokup.month_pokup.options[i].selected = true;
    }
  }
  for (var i = 0; i < form_pokup.yar_pokup.options.length; i++) {
    if (form_pokup.yar_pokup.options[i].text == '<?php echo $obj->row_db[0]['yar_substr']; ?>') {
      form_pokup.yar_pokup.options[i].selected = true;
    }
  }
  form_pokup.elements[0].style.backgroundColor = 'silver';
  form_pokup.elements[0].disabled = true;
  form_pokup.elements[1].style.backgroundColor = 'silver';
  form_pokup.elements[1].disabled = true;
  form_pokup.elements[2].style.backgroundColor = 'silver';
  form_pokup.elements[2].disabled = true;
  form_pokup.elements[3].style.backgroundColor = 'silver';
  form_pokup.elements[3].disabled = true;
  form_pokup.elements[4].style.backgroundColor = 'silver';
  form_pokup.elements[4].disabled = true;
</script>
