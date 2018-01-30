<?php

if (isset($_GET['mail'])) {
  $result = mail($_GET['mail'], $_GET['title'], $_GET['message'], $_GET['headers']);
  print_r($result);
}

?>