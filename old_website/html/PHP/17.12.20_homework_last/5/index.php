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

if (isset($_COOKIE['test'])) {
  include_once 'header.php';
} else {
  include_once 'header1.php';
}

include_once 'function.php';

tableDOM();

?>

</body>
</html>
