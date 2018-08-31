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
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <style></style>
</head>
<body>
<div class="container clearfix">
  <?php
  include_once 'header_1.php';
  include_once 'header_2.php';
  include_once 'slider.php';
  if (isset($_GET['show'])) {
    switch ($_GET['show']) {
      case 'download':
        include_once 'form-dowload.php';
        break;
      case 'search':
        include_once 'form-search.php';
        break;
      default:
        include_once 'fon.php';
    }
  }
  echo '<div id = "content" style="width:824px; float:left;">';
  include_once 'header.php';
  include_once 'function.php';
  /*if (isset($_POST['auto']) or isset($_POST['zapcasti'])) {
    include_once 'function.php';
//algoritm1();
    $algoritm = 'algoritm_' . key($_POST);
    $algoritm();
    include_once 'rezultat.php';
  }*/
  echo '</div>';
  include_once 'footer.php';
  /*include_once 'form.php';
  include_once 'header.php';
  include_once 'function.php';

  tableDOM();
  echo '<br>';*/
  ?>
</div>
<script>
  //автозагрузка после выбора фото
  function change() {
    var upload = document.getElementsByName('submit')[0];
    upload.click();
  }
</script>
</body>
</html>