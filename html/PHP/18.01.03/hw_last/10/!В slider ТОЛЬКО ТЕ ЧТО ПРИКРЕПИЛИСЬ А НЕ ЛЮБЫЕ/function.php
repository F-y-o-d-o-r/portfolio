<?php

include_once 'massiv.php';  

//if(isset($_GET['menu'])) {                      //%%%
//   switch($_GET['menu']) {                      //%%%
//   case knop1:                                  //%%%
//   echo '<form method="post" enctype="multipart/form-data">
//   <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
//   <input type="file" name="userfile[]" multiple="true">
//   <input type="submit" value="Записать" name="submit">
//   </form>';
//   break;
   //case knop2:                                  //%%%
   //echo '<form>
   //<input type="text" name="param" size="30">
   //<input type="button" value="Найти марку" onclick="post_send(\'tbody\', \'function.php\', [\'param\'], [param.value])"> <!-- !!! -->
   //</form>';
   //break;
//   }
//}

function func($a1, $a2) {  // ФУНКЦИЯ В ФУНКЦИИ ТУТ НЕ РАБОТАЕТ - ВЫНЕСТИ
   $a11=$a1[2]; // СОРТИРОВКА ПО ВТОРОМУ ИНДЕКСУ - ЦЕНЕ
   $a22=$a2[2];
   if($a11>$a22) {return 1;}
   else if($a11==$a22) {return 0;}
   else {return 0;}
}

// ОТКЛЮЧАЕМ ПРЕДУПРЕЖДЕНИЯ
error_reporting(E_ERROR);

// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ
if(isset($_FILES['userfile'])) {
$dir='/home/forum/www/';
 for($i=0; $i<count($_FILES['userfile']['tmp_name']); $i++) {
   //copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i]);
   if(copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i])) {
           //echo $_FILES['userfile']['name'][$i].'<br>';
   }
   else {
        echo 'Файл(ы) '.$_FILES['userfile']['name'][$i].' загрузить не удалось!<br>';
   }
 }
}

//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
$mas1=explode('||', $data);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
///////// ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
    if(isset($_FILES['userfile'])) {                       
         foreach($_FILES['userfile']['name'] as $kef=>$masf) {
            if(strpos(mb_strtoupper($masf), $mas12[$ke][0])!==false) {  
               $mas12[$ke][]='<img src="'.$masf.'">';
               $mas12[$ke][]=date('d-m-Y');
               $arr_img_yes[]=$masf; //!!!!!!$arr_img_yes
            }
         }
    }  
/////////
}

//СОРТИРОВКА-ЦЕНА
usort($mas12, 'func'); // ПОЛЬЗОВАТЕЛЬСКАЯ СОРТИРОВКА

// ПОЛУЧАЕМ POST ПОИСКА
if(isset($_POST['param'])) {
// НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
 foreach($mas12 as $ke12_=>$mas12_) { 
      if(strpos($mas12_[0], mb_strtoupper($_POST['param']))!==false) { // НАЙТИ ВХОЖДЕНИЕ В "МАКРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
        $mas12[$ke12_][0]='<a href="#" style="color:red;">'.$mas12[$ke12_][0].'</a>'; // ВЫДЕЛИТЬ ПО ВНЕШНЕМУ КЛЮЧУ(СТРОКА) ЭЛЕМЕНТ "0" (УЖЕ БЕЗ array_search)

        //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
        foreach($mas12[$ke12_] as $kee=>$masss) { 
          if($kee!=0) {                                                // ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
            $mas12[$ke12_][$kee]='<span style="color:blue;">'.$mas12[$ke12_][$kee].'</span>'; 
          }
        }

        //ЭЛЕМЕНТ-МАССИВ СЧИТАТЬ В ПЕРЕМЕННУЮ, УДАЛИТЬ ИЗ СТАРОГО МЕСТА И ВСТАВИТЬ В НАЧАЛО
        $mass=$mas12[$ke12_];                      
        unset($mas12[$ke12_]);                     
        array_splice($mas12, 0, 0, array($mass)); 

    } 
 } 
} 

//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
  //if(isset($_FILES['userfile'])) {                                       //%%%
  if(!empty($arr_img_yes)) {  //!!!!!!$arr_img_yes
     echo '<script>';
     echo 'window.parent.clearInterval(window.parent.int);';      //!!!!!
     echo 'window.parent.mass_img=new Array();';      //!!!!!
     echo 'window.parent.i=0;';      //!!!!!
     echo 'var r_tbody=window.parent.document.getElementById("tbody");';    //%%%
     echo 'while(r_tbody.childNodes.length) {r_tbody.removeChild(r_tbody.childNodes[0]);};';    //%%%
     //for($i=0; $i<count($_FILES['userfile']['name']); $i++) {
     //echo 'window.parent.mass_img['.$i.']="'.$_FILES['userfile']['name'][$i].'";';    //%%%
     for($i=0; $i<count($arr_img_yes); $i++) {      //!!!!!!$arr_img_yes
        echo 'window.parent.mass_img['.$i.']="'.$arr_img_yes[$i].'";';    //!!!!!!$arr_img_yes
     }
     echo 'window.parent.int=window.parent.setInterval("func_img()", 1500);';    //%%%
     echo '</script>';
  }
foreach($mas12 as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $rr=$rr."<td>$mas12__</td>"; 
  }
  if(isset($_POST['param'])) {
     $rr="<tr>$rr</tr>";                                       
     echo $rr;                                                
  }
  else {
     echo '<script>';
     echo 'var r_tbody=window.parent.document.getElementById("tbody");';    //%%%
     echo 'var r_rr=window.parent.document.createElement("tr");';           //%%%
     echo "r_rr.innerHTML='$rr';";
     echo 'r_tbody.appendChild(r_rr);';
     echo '</script>';
  }
}

?>
