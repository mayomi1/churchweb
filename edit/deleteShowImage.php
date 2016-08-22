<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();
$message=$err=$errE="";
if(!isset($_GET['gid'])){
    header("Location: deleteImage.php");
}else{
    $echo = "how far nah the page is not for you";
}
if(isset($_POST['deleteImage']) && $_SESSION['uid'] !="") {
    $gid = check($_POST['gid']);
    $deleteImage = $_POST['deleteImage'];
    db();
    global $link;
    veri();
    $del = mysqli_query($link, "SELECT * FROM gallery WHERE id=".$gid);
    if(mysqli_num_rows($del)!=0) {
        $deleteEvent = mysqli_query($link, "DELETE FROM gallery WHERE id=" . $gid);
        if(mysqli_affected_rows($link)==1){
            header("Location: deleteImage.php");
        }

    }else{
        $err= " ::: nothing to delete :::";
    }

}
require_once "../include/admin.html";
welcome();?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/superstory.html";
            $gid = $_GET['gid'];
            ?>
        </div>
        <div class="col-md-8">
            <form action="deleteShowImage.php?gid=<?php echo $gid;?>" method="post" >
                <label>you are sure you want to delete this Image?</label>
                <input type="submit" name="deleteImage" value="delete Image" class="btn btn-lg btn-danger">
                <input type="hidden" name="gid" value="<?php echo $gid;?>">
                <button class="btn btn-lg btn-default"><a href="deleteImage.php">No take me back</a></button>
            </form>
        </div>
    </div>

</div>


<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>