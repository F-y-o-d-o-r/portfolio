<?php
$a = 5;
$b = 3;
function func($a, $b)
{
  $c = $a + $b;
  echo $c;
}

func($a, $b);
//****************************************//
echo '<hr>';
$a = 5;
$b = 3;
function func1(&$a, $b)
{
  $c = $a + $b;
  $a++;
  echo $c . "<br>";
}

func1($a, $b);
echo $a . "<br>";
//****************************************//
echo '<hr>';
$glob = "global";
function func_glob()
{
  global $glob;//show global var better
  $loc = "local";
  //echo "$glob - $loc<br>";
  //echo $GLOBALS['glob'] . "$loc<br>";//without $ - show global var
  echo "$glob - $loc<br>";
}

func_glob();
echo "$glob - $loc<br>";
//****************************************//
echo '<hr>';
function func_stat()
{
  $d = 0;
  static $c = 0;
  echo ++$d . " - " . ++$c . "<br>";
}

func_stat();
func_stat();
func_stat();
//****************************************//
echo '<hr>';
function func_fluc($u, $fl = 1)
{//po umolchaniu
  if ($fl == 1) echo ++$u . "<br>";
  else echo --$u . "<br>";
}

func_fluc(5);
func_fluc(5, 0);
//****************************************//
echo '<hr>';
function func_param()
{
  for ($i = 0; $i < func_num_args(); $i++) {
    echo func_get_arg($i) . "<br>";
  }
}

func_param(1, 2, 3);
//****************************************//
echo '<hr>';
function func_write($text)
{
  echo $text . "<br>";
}

function func_write_bold($text)
{
  echo "<b>$text</b>" . "<br>";
}

//переменная функция
$var_func = "func_write";
$var_func("Hello");
$var_func = "func_write_bold";
$var_func("Hello");
//****************************************//
echo '<hr>';