<?php
ob_start();
include '../user/header_user_internalPage.php';
include '../include/connection_db.php';
if (!$_SESSION['user_id']) {
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sub Category</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $categoryID = $_GET['cate_id'];
        $query = "SELECT * FROM `subcate` WHERE `cate_id` = {$_GET['cate_id']}";
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
            echo "<img style='width:300px; height:300px;' src='../sub_sub_image/{$value['sub_image']}'>";
            echo "<h3><a href='Sub_Sub_Category.php?sub_id={$value['sub_id']}'>{$value['sub_name']}</a></h3>";
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