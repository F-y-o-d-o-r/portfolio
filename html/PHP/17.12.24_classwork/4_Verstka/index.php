<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
  <style>
    td {
      background-color: whitesmoke;
      border: 1px solid blue;
    }
  </style>
  <!--<script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>
<body>

<div id="container"
     style="width:1024px; background-color:whitesmoke; border:1px solid silver; border-radius:6px; box-sizing:content-box; margin:0px auto;">

    <?php

    include_once 'header1.php';
    include_once 'header2.php';

    include_once 'slider.php';
    echo '<div id="content" style="width:824px; background-color:silver; float:right;">';

    /*if (isset($_GET[menu])) {
        switch ($_GET[menu]) {
            case knopki:
                include_once 'forma.php';
                break;
            //case...
        }
    }*/

    echo '<div id="div_button"></div>';
    include_once 'shapka.php';
    include_once 'algoritm.php';
    echo '</div>';
    echo '<div style="clear:both;"></div>';
    include_once 'footer.php';

    ?>

</div>
<script src="ajax_post_get_jq.js"></script>
</body>
</html>
