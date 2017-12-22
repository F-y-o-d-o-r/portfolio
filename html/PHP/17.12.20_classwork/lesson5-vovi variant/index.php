<html>
<head>
<meta http-equiv="Content-Type" content="texthtml; charset=utf-8" />
<style>
 td {background-color:whitesmoke; border:1px solid blue;}
</style>
</head>
<body>

<?php
// print_r($_POST);
include_once 'form.php';

include_once 'algoritm.php';
if (isset($_POST['auto']) or isset( $_POST['zapcasti'])) {
	//$algoritm = 'func_'.key($_POST);
	//$algoritm();
	//include_once 'rezultat.php';
	switch (key($_POST)) {
		case 'auto':
			include_once 'shapka1.php';
			$algoritm = 'func_'.key($_POST);
			$algoritm();
			include_once 'rezultat1.php';
			break;
		case 'zapcasti':
			include_once 'shapka.php';
			$algoritm = 'func_'.key($_POST);
			$algoritm();
			include_once 'rezultat.php';
			break;
		default:

			break;
	}
	}


?>

</body>
</html>
