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
if(!isset($_GET['ebid'])){
    header("Location: editBlog.php");
}else{
    $echo = "how far nah the page is not for you";
}
if(isset($_POST['deleteBlog']) && $_SESSION['uid'] !="") {
    $ebid = check($_POST['ebid']);
    $deleteBlog = $_POST['deleteBlog'];
    db();
    global $link;
    veri();
    $del = mysqli_query($link, "SELECT * FROM blog WHERE blog_id=".$ebid);
    if(mysqli_num_rows($del)!=0) {
        $deleteBLog = mysqli_query($link, "DELETE FROM blog WHERE blog_id=" . $ebid);
        if(mysqli_affected_rows($link)==1){
            header("Location: editBLog.php");
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
            $ebid = $_GET['ebid'];
            ?>
        </div>
        <div class="col-md-8">
            <form action="deleteBlog.php?ebid=<?php echo $ebid;?>" method="post" >
                <label>you are sure you want to delete this events?</label>
                <input type="submit" name="deleteBlog" value="delete Event" class="btn btn-lg btn-danger">
                <input type="hidden" name="ebid" value="<?php echo $ebid;?>">
                <button class="btn btn-lg btn-default"><a href="editBlog.php">No take me back</a></button>
            </form>
        </div>
    </div>

</div>


<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>