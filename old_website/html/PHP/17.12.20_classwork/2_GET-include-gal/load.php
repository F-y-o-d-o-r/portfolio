<?PHP
//print_r($_GET);
if (isset($_GET['menu'])) {
    switch ($_GET['menu']) {
        case 'auto':
            include_once 'auto.php';
            //echo '<script>container.style.backgroundColor = "olive";</script>';
            break;
        case 'sport':
            include_once 'sport.php';
            break;
        case 'nature':
            include_once 'nature.php';
            break;
        default:
            include_once 'hello.php';
    }
} else include_once 'hello.php';