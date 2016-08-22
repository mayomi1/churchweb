<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();

/**if(!isset($_GET['erid'])){
    header("Location: showReply.php");
}else{
    $echo = "how far nah the page is not for you";
}**/
if(isset($_POST['deleteReply']) && $_SESSION['uid'] !="") {
    $erid = check($_POST['erid']);
    $ebid = $_GET['ebid'];
    $deleteReply = $_POST['deleteReply'];
    db();
    global $link;
    veri();
    $del = mysqli_query($link, "SELECT * FROM blog_reply WHERE reply_id='$erid'");
    if(mysqli_num_rows($del)!=0) {
        $deleteBLog = mysqli_query($link, "DELETE FROM blog_reply WHERE reply_id=".$erid);
        if(mysqli_affected_rows($link)==1){

            header("Location: editBlog.php");
        }
        else{
            echo "could not delete";
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
            $erid = $_GET['erid'];
            ?>
        </div>
        <div class="col-md-8">
            <form action="deleteShowReply.php?erid=<?php echo $erid;?>" method="post" >
                <label>you are sure you want to delete this events? ::</label>
                <input type="submit" name="deleteReply" value="delete Reply" class="btn btn-lg btn-danger">
                <input type="hidden" name="erid" value="<?php echo $erid;?>">
                <button class="btn btn-lg btn-default"><a href="showReply.php">No take me back</a></button>
            </form>
        </div>
    </div>

</div>


<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>