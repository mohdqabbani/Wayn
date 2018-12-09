<?php
ob_start();
include '../include/connection_db.php';
include '../user/header_user_internalPage.php';

if(isset($_POST['submit']))
{
    $name  = $_POST['username'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $phone = $_POST['phone'];
    if($_FILES['image']['error'] == 0)
    {
        $image_name  = $_FILES['image']['name'];
        $image_tmp   = $_FILES['image']['tmp_name'];
        $path        = "../image_user/";
        move_uploaded_file($image_tmp,$path.$image_name);
    }
    $query  = "INSERT INTO `users`(`username`, `email`, `password`, `phone`, `image`) "
            . "VALUES ('$name','$email','$pass','$phone','$image_name')";
    $result = mysqli_query($link, $query);
    $userSet = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $userSet['user_id'];
    
    header("Location:index.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up </title>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="card card-container">
          <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" enctype="multipart/form-data">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" placeholder="User Name" required="" class="form-group">
                <input type="email" name="email" placeholder="Email" required="" class="form-group">
                <input type="password" name="password" placeholder="Password" required="" class="form-group">
                <input type="text" name="phone" placeholder="Phone Number" class="form-group">
                <input type="file"name="image" >
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Sign in</button>
            </form><!-- /form -->
            <a href="login.php" class="forgot-password">
                My Account
            </a>
        </div><!-- /card-container -->
    </body>
</html>
<?php
include '../user/footer.php';
?>