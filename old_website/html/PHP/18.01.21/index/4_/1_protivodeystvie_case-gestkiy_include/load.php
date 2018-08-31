<?php
if (isset($_GET['menu'])) {
//include_once $_GET['menu'];
  switch ($_GET['menu']) {
    case auto:
      include_once 'auto';
      break;
    case sport:
      include_once 'sport';
      break;
    case nature:
      include_once 'nature';
      break;
    default:
      include_once 'hello';
  }
} else {
  include_once('hello');
}
?>
