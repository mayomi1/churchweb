<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once "../include/function.php";
verifylogin();
require_once "../include/dbconfig.php";

global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;

$errAddress=$message=$err="";


if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid']!="") {
    $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");
    $p_address = check($_POST['p_address']);

    if (empty($p_address)) {
        $errAddress="THE MESSAGE CANNOT BE EMPTY";
        $error = 1;
    }

    image("../uploaded_image/presvicar/", "p_picture");


    if ($error!=1) {
        veri();
        $result = mysqli_query($link, "SELECT * FROM president");

//$result = mysqli_query($link, $sql) or die("no query");
        if (mysqli_num_rows($result) != 0) {
            $update = mysqli_query($link, "UPDATE president SET president_address = '$p_address', president_picture = '$g_image'") or die("query not correct");

            $message= "president address has been successfully changed";
        } else {
            $err= "there was an error while loading please try again";
        }

        mysqli_close($link);
    }
}
?>


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
            <span class="message"><?php echo $message;?></span>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="p_address">president address</label>
                    <span class="error"><?php echo $errAddress;?></span>
                    <textarea name="p_address" id="p_address" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <label for="p_picture" >upload president image</label>
                    <input id="p_picture" name="p_picture" class="form-control" type="file">
                    <span class="error"><?php echo  $errImageNotSet, $errNotImage, $errImageExist,
                         $errTooLarge, $errEXT, $errNotUploaded, $errImage; ?></span>
                </div>
                <p>
                    <input type="submit" value="update" name="submit" class="btn btn-info">
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>



