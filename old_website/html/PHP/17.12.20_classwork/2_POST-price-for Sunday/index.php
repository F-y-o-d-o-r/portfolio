<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <style>
    td {
      background-color: whitesmoke;
      border: 1px solid blue;
    }
  </style>
</head>
<body>

<?php
include_once "forma.php";
if (isset($_POST['auto']) or isset($_POST['zapcasti'])) {
    include_once "algoritm.php";
    switch (key($_POST)) {
        case 'auto';
            include_once 'shapka.php';
            $algoritm = "func_" . key($_POST);
            $algoritm();
            include_once 'rezultat.php';
            break;
        case 'zapcasti';
            include_once 'shapka1.php';
            $algoritm = "func_" . key($_POST);
            $algoritm();
            include_once 'rezultat1.php';
    }
} else {
  include_once "hello.php";
}

?>

</body>
</html>
