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
$table_list = "table";
$a = "LENOVO";
$b = "A1000";
$c = 3000;
/*if ($table_list == "table") {
    include_once "header.php";
    include_once "result.php";
} else if ($table_list == "list") {
    include_once "header1.php";
    include_once "result1.php";
}*/
//controller
if (isset($table_list)) {
    switch ($table_list) {
        case "table";
            include_once "header.php";
            include_once "result.php";
            break;
        case "list";
            include_once "header1.php";
            include_once "result1.php";
            break;
        default;
            include_once "hello.php";
    }

} else {
    include_once "hello.php";
}

?>

</body>
</html>

