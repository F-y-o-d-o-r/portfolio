<?php
setcookie("firstDownload", "1");
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
  <style>
    .submit {
      display: none;
    }
  </style>
</head>
<body>
<?php
include_once 'form.php';
if (isset($_COOKIE['firstDownload'])) {
  include_once 'header.php';
} else {
  include_once 'header1.php';
}
include_once 'function.php';

tableDOM();
echo '<br>';
?>
<script>
  //автозагрузка после выбора фото
  function change() {
    var upload = document.getElementsByName('submit')[0];
    upload.click();
  }
</script>
</body>
</html>