<?php
ob_start();
include '../user/header_user_internalPage.php';
include '../include/connection_db.php';
if(isset($_POST['submit']))
{
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $text   = $_POST['message'];
    $query  = "INSERT INTO `contact`(`name`, `email`, `note`) VALUES ('$name','$email','$text')";
    $result = mysqli_query($link, $query);
    header("Location: index.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <style>
           @media (min-width: 1200px) { 
           .container .row label
            { margin-left: 500px; }
            .container .row input
            { margin-left: 500px; }
            
            .container .row textarea
            { margin-left: 500px; }
           }
            @media (max-width: 480px) { 
            .container .row label
            { margin-left: 0px; }
            .container .row input
            { margin-left: 0px; }
            
            .container .row textarea
            { margin-left: 0px; }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <form class="form-control" action="" method="post">
                            <fieldset>
                                <legend class="text-center">Contact us</legend>

                                <!-- Name input-->
                                <div class="form-group">
                                    <label  class="col-md-3 control-label" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input  id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                    </div>
                                </div>

                                <!-- Email input-->
                                <div class="form-group">
                                    <label  class="col-md-3 control-label" for="email">Your E-mail</label>
                                    <div class="col-md-9">
                                        <input  id="email" name="email" type="text" placeholder="Your email" class="form-control">
                                    </div>
                                </div>

                                <!-- Message body -->
                                <div class="form-group">
                                    <label  class="col-md-3 control-label" for="message">Your message</label>
                                    <div class="col-md-9">
                                        <textarea  class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body> 
</html>
<?php include '../user/footer.php'; ?>