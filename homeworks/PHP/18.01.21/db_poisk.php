<div id="poisk">
  <br>
  <form name="form_select">
    <input type="button" name="button_select" style="width:130px;" value="Искать покупки"
           onclick="post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value])">
    <!--<input type="text" name="name_select" style="width:125px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">-->
    <select name="name_sel" id="name_select_id" onchange="cng_pokup();" style="width:128px;"
            onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    </select>
    <input type="text" name="tel_select" style="width:130px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    <input type="text" name="adr_select" style="width:130px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    <select name="sel_tov" id="sel_tov_id" onchange="cng_tov();" style="width:130px;"
            onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    </select>
    <script>
      var tov_select = '';
      var name_select = '';
      function cng_tov() {
        if (form_select.sel_tov.selectedIndex == 0) {
          tov_select = '';
        }
        else {
          tov_select = form_select.sel_tov.options[form_select.sel_tov.selectedIndex].value;
        }
      }
      function cng_pokup() {
        if (form_select.name_sel.selectedIndex == 0) {
          name_select = '';
        }
        else {
          name_select = form_select.name_sel.options[form_select.name_sel.selectedIndex].value;
        }
      }
    </script>
    <input type="text" name="dat_select" style="width:130px; margin-left:75px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
  </form>

  <table style="width:100%;">
    <tbody>
    <tr>
      <td style="background-color:whitesmoke; text-align:center; color:blue; width:125px;">Покупка</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Клиент</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Телефон</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Адрес</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Товар</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:75px;">Вид</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">
        <table>
          <tr>
            <td rowspan="2" style="border:none; font-weight:bold; background-color:white;">Дата покупки</td>
            <td style="border:none; background-color:white;"><img src="top1010.jpg" style="cursor:pointer;"
                                                                  onclick="jquery_send('#tbody', 'post', 'db_all_query.php', ['sort_top'], []);">
            </td>
          </tr>
          <tr>
            <td style="border:none; background-color:white;"><img src="bottom1010.jpg" style="cursor:pointer;"
                                                                  onclick="jquery_send('#tbody', 'post', 'db_all_query.php', ['sort_bottom'], []);">
            </td>
          </tr>
        </table>
      </td>
    </tr>
    </tbody>
    <tbody id="tbody">
    </tbody>
  </table>
</div>


<?php
include_once 'db_all_query.php';                                                          // 8. php-СКРИПТ "0"-ГО (НАЧАЛЬНОГО) ВЫВОДА
?>