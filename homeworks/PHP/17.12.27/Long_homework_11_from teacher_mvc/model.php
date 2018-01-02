<?php
class LongClasswork
{
  /**************«massiv» - формирования двумерного массива****************/
  function massiv()
  {
    $massRows = explode('||', $this->data);//разбили строку на массив
    foreach ($massRows as $ind1 => $val1) {//формируем двумерный массив доразбивая остальную строку
      $massTd = explode('|', $val1);
      foreach ($massTd as $ind2 => $val2) {
        $massData[$ind1][$ind2] = $val2;
      }
    }
    $this->massData = $massData;
  }

  /*************«algoritm0» - сортируем по цене, по возрастанию**************/
  function usort()
  {
    usort($this->massData, array($this, 'func_sort'));
  }

  /************загрузка картинок и пуш их в массив + текущее время в следующий столбик*************/
  function download()
  {
    if (isset($_FILES)) {
      //$dir = "w:/domains/homeworks/2017.12.13/Long_homework_1/";
      $dir = "/home/forum/www/";
      for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
        if (strpos($_FILES['file']['name'][$i], 'jpg') !== false or strpos($_FILES['file']['name'][$i], 'gif') !== false or strpos($_FILES['file']['name'][$i], 'png') !== false) {
          if (copy($_FILES['file']['tmp_name'][$i], $dir . $_FILES['file']['name'][$i])) {
            $name = $_FILES['file']['name'][$i];
            foreach ($this->massData as $key => $val) {
              foreach ($val as $key2 => $val2) {
                if (mb_strtolower(strip_tags($val2)) == strstr("$name", ".", true)) {
                  $this->massData[$key][] = "<img src=" . $name . "></img>";
                  $this->massData[$key][] = date('d-m-Y H:i:s');
                }
              }
            }
            echo 'succes' . '<br>';
          }
        } else {
          echo 'error';
        }
      }
    }
  }

  /***********************AJAX сортируем по поисковому запросу и выводим******************/
  function sortAndDom()
  {
    $tmp = 0;
    if (isset($_POST['search_what']) and !empty($_POST['search_what'])) {//вывод через аякс
      $varrr = '';
      foreach ($this->massData as $key => $val40) {
        if (strpos($val40[0], mb_strtoupper($_POST['search_what'])) !== false) {
          foreach ($this->massData[$key] as $key2 => $val30) {
            if ($key2 === 0) {
            //  $var1 = "<td style='color: red; background-color: $this->col2;'>$val30</td>";
            //} else $var1 .= "<td style='color: blue; background-color: $this->col2;'>$val30</td>";
                   $var1 = "<td style='color: red; background-color: $this->col1;'>$val30</td>";
            } else $var1 .= "<td style='color: blue; background-color: $this->col1;'>$val30</td>";
          }
          $var1 = "<tr>$var1</tr>";
        } else {
          $var2 = '';
          foreach ($this->massData[$key] as $key22 => $val22) {
            //$var2 .= "<td style='background-color: $this->col2;'>$val22</td>";
            $var2 .= "<td style='background-color: $this->col1;'>$val22</td>";
          }
          $varrr .= "<tr>$var2</tr>";
        }
      }
      echo $var1 . $varrr;//вывод через аякс
    } else {//вывод обычный при загрузке или через iframe для аякса (при загрузку фото)
      echo '<script>';
      echo 'window.parent.tbody.innerHTML = "";';
      echo '</script>';
      foreach ($this->massData as $massData_index => $massData_value) {
        $td = '';
        foreach ($massData_value as $index => $massData_value_inside) {
          $td .= '<td style="background-color: ' . $this->col1 . '">' . $massData_value_inside . '</td>';
        }
        echo '<script>';
        echo 'var tbody=window.parent.document.getElementById("tbody");';
        echo 'var tr=window.parent.document.createElement("tr");';
        echo "tr.innerHTML='$td';";
        echo 'tbody.appendChild(tr);';
        echo '</script>';
      }
    }
    /***********************AJAX сортируем по поисковому запросу и выводим - end******************/
  }

  /*********************---Функция сортировки---*******************************/
  function func_sort($a, $b)
  {
    if ($a[2] > $b[2]) {
      return 1;
    } else if ($a[2] == $b[2]) {
      return 0;
    } else return -1;
  }
}//конец класса LongClasswork

class loadColor extends LongClasswork //меняем цвет ВЕЗДЕ - В ЗАВИСИМОСТИ ОТ СОБЫТИЯ...
{
  function bgColorOne($mass, $col1)
  {
    $this->massData = $mass;
    $this->col1 = $col1;
    $this->sortAndDom();
  }
}

?>