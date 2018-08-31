<?php
//setcookie("firstDownload", "1");
//setcookie("firstDownload", "", time() - 3600);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HOMEWORK_9_PHP</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
  <script src="ajax-plugin.js"></script>
  <script src="main.js"></script>
  <style></style>
</head>
<body>
<div class="container clearfix">
  <?php
  include_once 'header_1.php';
  include_once 'header_2.php';
  include_once 'slider.php';
  echo '<div id = "download-search" style="width:824px; float:left;"></div>';//вывод поиска или загрузки сюда
  echo '<div id = "content" style="width:824px; float:left;">';
  include_once 'header.php';
  include_once 'function.php';
  echo '</div>';
  include_once 'footer.php';
  ?>
</div>

<script>
  //автозагрузка после выбора фото
  var mass_img_all = document.getElementById('tbody').getElementsByTagName('img');
  function change() {
    var upload = document.getElementsByName('submit')[0];
    upload.click();
  }
</script>
</body>
</html>