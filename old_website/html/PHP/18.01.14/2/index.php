<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<?php
$db_host = 'classworks';
$db_user = 'root';
$db_pass = '';
$db_base = '3_tables';
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_base);
if(mysqli_connect_errno()) {
  echo 'Error';
  exit;
}

mysqli_query($link, 'set names utf8');
$res = mysqli_query($link, 'select * from user');//object
mysqli_close($link);
while ($row = mysqli_fetch_assoc($res)){
  $roww[]=$row;
}
print_r($roww);

/*
print_r($row);*/
?>

</body>
</html>
