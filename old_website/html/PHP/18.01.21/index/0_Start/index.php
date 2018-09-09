<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <link rel="stylesheet" type="text/css" href="db_style.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script type="text/javascript" src="ajax_post_get_jq.js"></script>
  <style>
    td {
      background-color: white;
      border: 1px solid silver;
      color: teal;
      font-size: 12pt;
    }
  </style>
  <script type="text/javascript" src="script.js"></script>
</head>
<body>

<?php

echo '<div id="container">';
echo '<div id="slider">';
echo '<div id="logo"><img src="logo.jpg"></div>';
echo '<div id="menu">';                     // 1."ajax-МЕНЮ" - jquery_send (ИСПОЛЬНИТЕЛЬНЫЙ js-КОД)
echo '<ul id="spisok">
<li class="rool" style="color:royalblue; font-weight:bold;" onclick="color_font(this); jquery_send(\'#okno\', \'post\', \'db_poisk.php\', [\'poisk\'], []);">Поиск</li><br>
<li class="rool" onclick="color_font(this); jquery_send(\'#okno\', \'post\', \'db_tovar.php\', [\'tovar\'], []);">Товары</li><br>
<li class="rool" onclick="color_font(this); jquery_send(\'#okno\', \'post\', \'db_klient.php\', [\'klient\'], []);">Клиенты</li><br>
<li class="rool" onclick="color_font(this); jquery_send(\'\', \'post\', \'\', [], []);">Добавить покупку</li></ul>';
echo '</div>';
echo '</div>';
echo '<div id="okno">';
include_once 'db_poisk.php';                // 2."КАРКАС-ПОИСК" - HTML+ajax+js для ТАБЛИЦЫ НАЧАЛЬНОГО ВЫВОДА И select-меню НАЧАЛЬНОЙ ЗАГРУЗКИ(ТОВАРЫ)
echo '</div>';
echo '<div style="clear:both;"></div>';
echo '<div id="footer">Copyright : Студия WebZoRo, Чернигов, 2015 год</div>';
echo '</div>';

?>

<script>
  function color_font(elem) {                 // 3.js-ФУНКЦИЯ "ВЫДЕЛЕНИЯ" ВЫБРАННОГО ПУНКТА МЕНЮ (li)
    var spis = document.getElementById("spisok").getElementsByTagName("li");
    for (var i = 0; i < spis.length; i++) {
      if (spis[i] == elem) {
        spis[i].setAttribute("style", "color:royalblue; font-weight:bold;");
      }
      else {
        spis[i].setAttribute("style", "color:teal; font-weight:normal;");
      }
    }
  }
</script>

</body>
</html>
