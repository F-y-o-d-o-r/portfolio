<div id="poisk">
  <br>
  <form name="form_select">
    <!--  4. КНОПКА ajax-ПОИСКА  -->
    <input type="button" name="button_select" style="width:125px;" value="Искать покупки"
           onclick="post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value])">
    <input type="text" name="name_select" style="width:219px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    <input type="text" name="tel_select" style="width:125px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    <input type="text" name="adr_select" style="width:125px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    <!--  5. select-МЕНЮ "ТОВАР"  -->
    <select name="sel_tov" id="sel_tov_id" onchange="cng_tov();" style="width:125px;"
            onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
    </select>
    <script>
      var tov_select = '';
      function cng_tov() {                                                                      // 6. js-ПОИСК БЕЗ "0"-ГО
        if (form_select.sel_tov.selectedIndex == 0) {
          tov_select = '';
        }
        else {
          tov_select = form_select.sel_tov.options[form_select.sel_tov.selectedIndex].value;
        }
      }
    </script>
    <input type="text" name="dat_select" style="width:125px;"
           onkeypress="if(event.which==13) {post_send('tbody', 'db_all_query.php', ['name_select', 'tel_select', 'adr_select', 'tov_select', 'dat_select'], [name_select.value, tel_select.value, adr_select.value, tov_select, dat_select.value]); return false;}">
  </form>

  <table style="width:100%;">
    <tbody>
    <tr>
      <!--  7. "ШАПКА" ТАБЛИЦЫ  -->
      <td style="background-color:whitesmoke; text-align:center; color:blue; width:125px;">Покупка</td>
      <td style="background-color:silver; text-align:center; font-weight:bold;">Клиент</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Телефон</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Адрес</td>
      <td style="background-color:silver; text-align:center; font-weight:bold; width:125px;">Товар</td>
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