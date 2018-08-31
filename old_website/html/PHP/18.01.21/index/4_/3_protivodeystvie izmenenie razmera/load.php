<?php
if(isset($_GET['menu'])) {
include_once $_GET['menu'];
}
else {
include_once('hello');
}
?>
