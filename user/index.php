<?php
include '../user/header_homepage.php';
include '../include/connection_db.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wayn Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <script src="js/JQuery.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <link href="js/jquery-ui.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        $query = "SELECT * FROM `category`";
        $result = mysqli_query($link, $query);
        $categorySet = Array();
        while ($row = mysqli_fetch_assoc($result)) {
            $categorySet[] = $row;
        }
        echo '<div class="container-fluid">';
        echo '<ul class="thumbnails">';
        foreach ($categorySet as $value) {
            echo '<li class="span4">';
            echo '<div class="thumbnail">';
            echo "<img style='width:300px; height:300px;' src='../image_category/{$value['image']}'>";
            echo "<h3><a href='Sub_Category.php?cate_id={$value['cate_id']}'>{$value['cate_name']}</a></h3>";
            echo '</div>';
            echo '</li>';
        }
        echo "</ul>";
        echo '</div>';
        ?>
        <footer class="container-fluid">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2018 UpSkills, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>

        <!--    Last Code ********************************************    -->
        <script src="../user/js/jquery.js"></script>
        <script src="../user/js/bootstrap-transition.js"></script>
        <script src="../user/js/bootstrap-alert.js"></script>
        <script src="../user/js/bootstrap-modal.js"></script>
        <script src="../user/js/bootstrap-dropdown.js"></script>
        <script src="../user/js/bootstrap-scrollspy.js"></script>
        <script src="../user/js/bootstrap-tab.js"></script>
        <script src="../user/js/bootstrap-tooltip.js"></script>
        <script src="../user/js/bootstrap-popover.js"></script>
        <script src="../user/js/bootstrap-button.js"></script>
        <script src="../user/js/bootstrap-collapse.js"></script>
        <script src="../user/js/bootstrap-carousel.js"></script>
        <script src="../user/js/bootstrap-typeahead.js"></script>
        <script src="../user/js/holder/holder.js" type="text/javascript"></script>
        <script>
            !function ($) {
                $(function () {
                    // carousel demo
                    $('#myCarousel').carousel()
                    interval: 2000;
                })
            }(window.jQuery)
        </script>

    </body>
</html>