<?php
if (isset($_FILES['userfile'])) {
  $dir = '/';
  for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
    $img = getimagesize($_FILES['userfile']['tmp_name'][$i]);
    //print_r($img);
    if ($img['mime'] == 'image/jpeg' or $img['mime'] == 'image/gif' or $img['mime'] == 'image/png') {
      if (copy($_FILES['userfile']['tmp_name'][$i], $dir . $_FILES['userfile']['name'][$i])) {

//!!! - ПЕРЕЗАПИСЬ ИЗОБРАЖЕНИЯ !!!
// исходное изображение
        $source = $dir . $_FILES['userfile']['name'][$i];
// путь для сохранения новой картинки
        $new_file = $dir . $_FILES['userfile']['name'][$i];
        $width = 125; // новая ширина
        $height = 125; // новая высота
// цвет заливки фона
        $rgb = 0xffffff;
//узнаем размеры исходной картинки
        $size = getimagesize($source);
//пропорция ширины
        $x_ratio = $width / $size[0];
//пропорция высоты
        $y_ratio = $height / $size[1];
// определяем соотношения ширины к высоте
        $ratio = min($x_ratio, $y_ratio);
        $use_x_ratio = ($x_ratio == $ratio);
// высчитываем новую ширину картинки
        $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
// высчитываем новую высоту картинки
        $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
// расхождение с заданными параметрами по ширине
        $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
// расхождение с заданными параметрами по высоте
        $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
// создаем холст пропорциональное сжатой картинке
        $img = imagecreatetruecolor($width, $height);
// заливаем холст цветом $rgb
        imagefill($img, 0, 0, $rgb);
// загружаем исходную картинку - работает только с форматом jpeg (иначе imagecreatefromgif, imagecreatefrompng)!!!
        $photo = imagecreatefromjpeg($source);
// копируем на холст сжатую картинку с учетом расхождений
        imagecopyresampled($img, $photo, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);
// сохраняем результат
        imagejpeg($img, $new_file);
// очищаем память после выполнения скрипта
        imagedestroy($img);
        imagedestroy($photo);
//!!! - ПЕРЕЗАПИСЬ ИЗОБРАЖЕНИЯ !!!

        //echo $_FILES['userfile']['name'][$i].'<br>';
      } else {
        echo 'Файл(ы) ' . $_FILES['userfile']['name'][$i] . ' загрузить не удалось!<br>';
      }
    } else {
      echo 'Вы пытаетесь записать не файл изображения!';
    }
  }
}
?>