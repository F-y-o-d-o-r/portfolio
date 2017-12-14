<?php

/*if (isset($_FILES)) {
    print_r($_FILES);
    $dir = "2017.12.13";
    if (copy($_FILES['userfile']['tmp_name'], $dir . $_FILES['userfile']['name'])) {
        echo 'succes';
    } else {
        echo 'error';
    }
}*/
if (isset($_FILES)) {
    print_r($_FILES);
    $dir = "2017.12.13";
    for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
        if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
            echo 'succes';
        } else {
            echo 'error';
        }
    }

}

?>