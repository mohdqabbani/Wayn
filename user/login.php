<?php
ob_start();
include '../user/header_user_internalPage.php';
include '../include/connection_db.php';

if(isset($_POST['submit']))
{
    $email   = $_POST['email'];
    $pass    = $_POST['password'];
    $query   = "SELECT * FROM `users` WHERE email = '$email' and password ='$pass'";
    $res = mysqli_query($link, $query);
    $userSet = mysqli_fetch_assoc($res);
  
     
    if(!empty($userSet['user_id']))
    { $_SESSION['user_id'] = $userSet['user_id'];}
    header("Location:index.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title> 
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Sign in</button>
            </form><!-- /form -->
            <a href="singup.php" class="forgot-password">
               Sign Up 
            </a>
        </div><!-- /card-container -->
   

    </body>
</html>
<?php
include '../user/footer.php';
?>