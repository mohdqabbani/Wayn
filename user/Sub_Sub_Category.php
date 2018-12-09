<?php
ob_start();
include '../user/header_user_internalPage.php';
include '../include/connection_db.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sub Sub Category</title>
        <style>   
            @media (min-width: 1200px)
            {
                .container-fluid .thumbnail h5{
                    color: red;
                    padding-left: 150px;
                }
            }
            @media (min-width: 768px) and (max-width: 979px)
            {
                .container-fluid .thumbnail h5{
                    color: red;
                    padding-left: 50px;
                }
            }
           @media (max-width: 480px) { 
           .container-fluid .thumbnail h5{
                    color: red;
                    padding-left: 100px;
                }
           }

        </style>
    </head>
    <body>
        <?php
        $query = "SELECT * FROM `subsubcate` WHERE `sub_id` = {$_GET['sub_id']}";
        $res = mysqli_query($link, $query);
        $cateSet = Array();
        while ($row = mysqli_fetch_assoc($res)) {
            $cateSet[] = $row;
        }
        echo '<div class="container-fluid">';
        echo '<ul class="thumbnails">';
        foreach ($cateSet as $value) {
            echo '<li class="span4">';
            echo '<div class="thumbnail">';
            $imgs = unserialize($value['imagesubsub']);
            foreach ($imgs as $imgg) {
                echo "<img width='300px' height='300px' src='../sub_sub_image/{$imgg}'>";
            }
            echo "<h5 >{$value['name']}</h5>";
            echo "<h5>{$value['address']}</h5>";
            echo "<h5>{$value['contact']}</h5>";
            echo '</div>';
            echo '</li>';
        }
        echo "</ul>";
        echo '</div>';
        ?>
    </body>
</html>
<?php
include '../user/footer.php';
?>