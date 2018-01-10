<?php
/*defined('start') or die('access error');
*/?>


<form>
  <input type="text" name="param" size="30">
  <input type="button" value="Найти марку"
         onclick="post_send('tbody', 'function.php', ['param', 'sess_id'], [param.value, func_sess_id()])">
  <input type="button" value="Clear"
         onclick="post_send('tbody', 'function.php', ['param', 'clear'], [param.value, ''])">
</form>
<script>
  function func_sess_id() {
    if (document.getElementById('ses')) {
      //alert(document.getElementById('ses'));
      return document.getElementById('ses').innerHTML;
    }else return '';
  }
</script>