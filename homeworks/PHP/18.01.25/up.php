<?php
if (isset($_FILES['userfile'])) {
  //$dir = '/home/localhost/www/img/tmp/';
  $dir = '/domains/homeworks/2018.01.25/img/tmp/';
  $slll = mt_rand(1, 1000);
  $mas = getimagesize($_FILES['userfile']['tmp_name']);
  if ($mas['mime'] == 'image/jpeg' or $mas['mime'] == 'image/gif' or $mas['mime'] == 'image/png') {
    copy($_FILES['userfile']['tmp_name'], $dir . 'tmp' . $slll . '.jpg');
    $source_ = $dir . 'tmp' . $slll . '.jpg';
    $new_file_ = $dir . 'tmp' . $slll . '.jpg';
    $new_file_name_ = 'tmp' . $slll . '.jpg';
    $width = 75;
    $height = 75;
    $rgb = 0xffffff;
    $size = getimagesize($source_);
    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];
    $ratio = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);
    $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
    $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
    $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
    $img = imagecreatetruecolor($width, $height);
    imagefill($img, 0, 0, $rgb);
    switch ($mas['mime']) {
      case 'image/jpeg':
        $photo = imagecreatefromjpeg($source_);
        break;
      case 'image/gif':
        $photo = imagecreatefromgif($source_);
        break;
      case 'image/png':
        $photo = imagecreatefrompng($source_);
        break;
    }
    imagecopyresampled($img, $photo, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);
    imagejpeg($img, $new_file_, 100);
    imagedestroy($img);
    imagedestroy($photo);

    echo '<script>';
    echo 'var img_tov_error=window.parent.document.getElementById("tov_error");';
    echo 'img_tov_error.innerHTML="&nbsp";';
    echo 'var img_tovar_tmp=window.parent.document.getElementById("tovar_img_img");';
    echo 'img_tovar_tmp.setAttribute("src", "img/tmp/' . $new_file_name_ . '");';
    echo '</script>';
  } else {
    echo '<script>';
    echo 'var img_tovar_tmp=window.parent.document.getElementById("tovar_img_img");';
    echo 'img_tovar_tmp.setAttribute("src", "");';
    echo 'var img_tov_error=window.parent.document.getElementById("tov_error");';
    echo 'img_tov_error.innerHTML="Файл не jpg,png,gif!!! Выберите другой...";';
    echo '</script>';
  }
}
?>