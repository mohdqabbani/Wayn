<?php
session_start();
include '../include/connection_db.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
    <!-- NAVBAR ================================================== -->
    <div class="navbar-wrapper">
        <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
        <div class="container">

            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Wayn Website</a>
                    <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="#contact">Point</a></li>
                            <li><a href="#FAQ">FAQ</a></li>
                            <li><a href="contact.php">Contacts</a></li>
                            <li><a href="about.php">About</a></li>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                echo "<li><a href='logout.php'>Logout</a></li>";
                            }
                            else { echo "<li><a href='login.php'>Login</a></li>"; }
                            ?>
                            <form class="navbar-search pull-left">
                                <input type="text" class="search-query" placeholder="Search">
                            </form>
                            <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->

                        </ul>

                    </div><!--/.nav-collapse -->
                </div><!-- /.navbar-inner -->
            </div><!-- /.navbar -->

        </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->


    <!-- Carousel
================================================== -->
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php
            $query = "SELECT * FROM `advertisement` WHERE `adshow` = 'Home Page'";
            $result = mysqli_query($link, $query);

            $userSet = Array();
            while ($row = mysqli_fetch_assoc($result)) {
                $userSet[] = $row;
            }
            foreach ($userSet as $value) {
                echo '<div class="item">';
                echo "<img src='../advertisementImage/{$value['image']}' alt=''>";
                echo '<div class="container">';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
    <!-------- -->



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

