<?php
error_reporting(E_ERROR);

if (isset($_FILES['userfile'])) {
    $dir = '2017.12.13';
    for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
        if (strpos($_FILES['userfile']['name'][$i], 'jpg') !== false or strpos($_FILES['userfile']['name'][$i], 'gif') !== false or strpos($_FILES['userfile']['name'][$i], 'png') !== false) {
            if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {
                echo 'Файл ' . ($i + 1) . ' переместили успешно!<br>';
            } else {
                echo 'Ошибка перемещения файла ' . ($i + 1) . '!<br>';
            }
        }
    }
}

?>
