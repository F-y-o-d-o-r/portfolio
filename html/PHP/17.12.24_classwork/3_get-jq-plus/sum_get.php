<?php
$x=$_GET['param1']; // получили – тут param1 – УЖЕ param1.value
$y=$_GET['param2']; // получили – тут param2 – УЖЕ param2.value
echo $x+$y; // ЗНАЧЕНИЕ echo УХОДИТ В responseText – Т.Е. ЭТО ИМЕННО ТО, ЧТО БУДЕТ ВОЗВРАЩЕНО В ВИДЕ РЕЗУЛЬТАТА
?>
