<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once ("../include/function.php");
verifylogin();
require_once "../include/dbconfig.php";
$message=$errAddress=$err="";

global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;



if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid']!="") {
    $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");

    $v_address = check($_POST['v_address']);

    $error = 0;
    if (empty($v_address)) {
        $errAddress= "THE MESSAGE CANNOT BE EMPTY";
        $error = 1;
    }


    image("../uploaded_image/presvicar/", "v_picture");
    if ($error != 1 && $g_image != "" && $_SESSION['uid']!="") {
        $result = mysqli_query($link, "SELECT * FROM president");

//$result = mysqli_query($link, $sql) or die("no query");
        if (mysqli_num_rows($result) != 0) {
            $update = mysqli_query($link, "UPDATE president SET vicar_adress = '$v_address', vicar_picture = '$g_image'") or die("query not correct");

            $message= "you have successfully update the vicar address ";
        } else {
            $err= "an error occur while updating please try again ";
        }

        mysqli_close($link);
    }else $err= "an error has occur please check and try again";
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
    welcome()?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/story.html"?>

        </div>

        <div class="col-md-8">
            <span class="error"><?php echo $err;?></span>
            <span class="message"><?php echo $message, $messageSuccess, $messageImageName;?></span>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" class="form-group">
                <div class="form-group">
                    <label for="v_address">vicar address</label>
                    <span class="error"><?php echo $errAddress;?></span>
                    <textarea name="v_address" id="v_address" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="v_picture">upload vicar image</label>
                    <span class="error"><?php echo $errImageNotSet, $errNotImage, $errImageExist,
                         $errTooLarge, $errEXT, $errNotUploaded, $errImage;?></span>
                    <input id="v_picture" name="v_picture" class="form-control" type="file">
                </div>
                <div>
                    <input type="submit" value="update" name="submit" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>