<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */

require_once "../include/function.php";
verifylogin();

$message=$err=$messageP=$errAddress="";
$errP="";
global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;


if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid']) {
    db();
    global $link;

    $v_address = check($_POST['v_address']);

    if (empty($v_address)) {
        $errAddress= "THE MESSAGE CANNOT BE EMPTY";
        $error = 1;
    }


    image("../uploaded_image/presvicar/","v_pix");
    
    if($error!=1){
        $result = mysqli_query($link, "SELECT * FROM president ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($result) != 0) {
        $update = mysqli_query($link, "UPDATE president SET vicar_adress = '$v_address' ");
        if (mysqli_affected_rows($link) == 1) {
            $message = " vicar message successfully edited  ";
        } else {
            $err = " vicar message was changed  ";
        }
    }

        if($error!=1) {
            $updatepix = mysqli_query($link, "UPDATE president SET vicar_picture = '$g_image' ");
            if (mysqli_affected_rows($link) == 1) {
                $messageP = "image was successfully uploaded ";
            } else {
                $errP = " image was not changed ";
            }
        }else{
            $errP = " image was not changed ";
        }
    } else {
        $err= "There is nothing to edit";
    }

}


require_once "../include/admin.html";
welcome();?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/superstory.html"?>
        </div>

        <div class="col-md-8">
            <span class="error"><?php echo $err, $errP;?></span>
            <span class="message"><?php echo $message, $messageP;?></span>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="p_address">vicar address</label>
                    <span class="error"><?php echo $errAddress;?></span>
            <textarea name="v_address" id="v_address" class="form-control" rows="25"><?php foreach(selection() as $address){
                    echo $address['vicar_adress'];global $link; $link->close();
                };?></textarea>
                </div>

                <div class="form-group">
                    <label for="v_pix">President picture</label>
                    <span class="error"><?php echo $errImage, $errImageNotSet, $errNotImage, $errImageExist,
                         $errTooLarge, $errEXT, $errNotUploaded, $errImage; ?></span>
                    <input id="v_pix" name="v_pix" type="file" class="form-control">
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
