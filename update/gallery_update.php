<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once ("../include/function.php");
verifylogin();
global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;

$err=$message="";
if(isset($_SESSION)) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        image("../uploaded_image/gallery/", "g_picture");

        if ($error != 1) {
            require_once("../include/dbconfig.php");
            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to server");

            $result = mysqli_query($link, "INSERT INTO gallery (image) VALUE ('$g_image')");

            if ($result) {
                $message = "new picture has been added succssfully";
            } else {
                $err ="an error occur try again";
            }

            mysqli_close($link);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>


    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

    <?php
    require_once "../include/admin.html";
    welcome();?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/story.html"?>
        </div>

        <div class="col-md-8">
            <span class="message"><?php echo $messageSuccess, $message, $err ?></span>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="g_picture">upload a picture</label>
                    <input type="file" id="g_picture" name="g_picture" class="form-control">
                    <span class="error"><?php echo $errImage, $errImageNotSet, $errNotImage, $errImageExist,
                    $errTooLarge, $errEXT, $errNotUploaded, $errImage; ?></span>

                </div>

                <input class="btn btn-info" type="submit" value="Upload" name="submit">


            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>