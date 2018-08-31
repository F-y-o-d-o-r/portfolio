<?php
setcookie('test', 'php');
?>
<html>
<head>
  <style>
    td {
      background-color: whitesmoke;
      border: 1px solid blue;
    }
  </style>
</head>
<body>

<?php

include_once 'form.php';
include_once 'header.php';
include_once 'function.php';

tableDOM();

?>

</body>
</html>
