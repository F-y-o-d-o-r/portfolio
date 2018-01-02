<?php
include_once 'array.php';

include_once 'model.php';

$LCl = new LongClasswork();
$LCl->data = $data;
$LCl->massiv();
$LCl->usort();
$LCl->download();

$domcolor=new loadColor();

include_once 'controller.php';





