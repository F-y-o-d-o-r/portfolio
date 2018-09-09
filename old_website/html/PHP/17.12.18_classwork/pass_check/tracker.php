<?php
include_once "connect.php";
function connect_db($ul, $up)
{
    global $mysql;
    $yes = 0;
    foreach ($mysql as $key => $val) {
        if (in_array($ul, $val) and in_array($up, $val)) {
            echo 'hello ' . $val[0];
            $yes = 1;
        }
    }
    if ($yes == 0) {
        echo 'wrong';
    }
}
/*foreach ($val as $key2 => $val2) {
            if($ul == $val2[0] and $up == $val2[1]){
                echo 'hello' . $val2[0];
            } else 'wrong login - password';
        }*/