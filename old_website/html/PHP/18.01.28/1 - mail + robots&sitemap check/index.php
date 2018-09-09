<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <style>
    td {
      border: 1px solid blue;
      font-family: tahoma;
      font-size: 10pt;
      text-align: center;
    }
  </style>
</head>
<body id="bod">

<form name="forma_site" style="margin:0px;">
  <input type="text" name="param_site" size="75" maxlength="100"
         onkeypress="if(event.which==13) {reg_site(param_site.value); return false;}">
  <input type="button" value="Go" onclick="reg_site(param_site.value);"> <span style="color:sienna;">Пример формата ввода : <b>site.com.ua</b></span>
</form>
<span id="err_site" style="color:red; font-weight:bold;"></span>
<br>

<table>
  <tbody>
  <tr>
    <td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие файла robots.txt</td>
    <td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие директивы Host</td>
    <td style="background-color:silver; font-weight:bold; text-align:center; width:150px;">Наличие директивы Sitemap
    </td>
  </tr>
  </tbody>
  <tbody id="tbod">
  </tbody>
</table>

<br>
<div id="forma_email" style="display:none;">
  <form id="forma_email" name="forma_email" style="margin:0px;">
    <input type="text" name="param_email" size="75" maxlength="100"
           onkeypress="if(event.which==13) {reg_email(param_email.value); return false;}">
    <input type="button" value="Go2" onclick="reg_email(param_email.value);"> <span style="color:sienna;">Пример формата ввода : <b>login@mail.com</b></span>
  </form>
  <span id="err_email" style="color:red; font-weight:bold;"></span>
</div>

<span id="null" style="display:none;"></span>

<script>
  function reg_site(par) {
    var r = /^\w+(\.\w+)+$/;
    if (r.test(par)) {
      err_site.innerHTML = "";
      jquery_send("#tbod", "post", "site_email.php", ["site"], [par]);
    }
    else {
      var rtbod = document.getElementById("tbod");
      while (rtbod.childNodes.length) {
        rtbod.removeChild(rtbod.childNodes[0]);
      }
      err_site.innerHTML = "Ошибка в формате ввода site. Исправьте!!!";
    }
  }
  function reg_email(par) {
    //var r = /^\w+\.?\w+@\w+(\.\w+)+$/i;
    var r = /^(\w+\.?)+\w+@\w+(\.\w+)+$/i;
    if (r.test(par)) {
      err_email.innerHTML = "";
      var tb = document.getElementById("tbod").innerHTML;
      jquery_send("#null", "post", "site_email.php", ["email", "tb", "site_email"], [par, tb, document.forms[0].elements[0].value]);
    }
    else {
      err_email.innerHTML = "Ошибка в формате ввода email. Исправьте!!!";
    }
  }
  function jquery_send(elemm, method, program, param_arr, value_arr) {
    var str = '';
    for (var i = 0; i < param_arr.length; i++) {
      str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';
    }
    $.ajax({
      type: method, url: program, data: str, success: function (data) {
        $(elemm).html(data);
      }
    });
  }
</script>

</body>
</html>
