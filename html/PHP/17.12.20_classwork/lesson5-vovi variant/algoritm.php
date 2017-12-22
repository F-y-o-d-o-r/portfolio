<?php

// print_r($_POST);
if (isset($_POST['auto'])) {
	include 'mass_auto.php';
}
if (isset($_POST['zapcasti'])) {
	include 'mass_zapcasti.php';
}

function func_sort($a1,$a2){
	if($a1[2]>$a2[2]) return 1 ;
		if($a1[2]==$a2[2]) return 0 ;
			if($a1[2]<$a2[2]) return -1 ;
	}
	function algoritm1(){
		global $price;
		usort($price, 'func_sort');
	}

function func_auto(){
		global $price;
		usort($price, 'func_sort');
		foreach ($price as $k1 => $price2) {
			foreach ($price2 as $k2 => $val2) {
			$price[$k1][$k2] = "<span style="."color:red;".">".$val2."</span>";
			}
		}
	};	
function func_zapcasti(){
		global $price;
		usort($price, 'func_sort');
		foreach ($price as $k1 => $price2) {
			foreach ($price2 as $k2 => $val2) {
			$price[$k1][$k2] = "<span style="."color:blue;".">".$val2."</span>";
			}
		}
};
?>