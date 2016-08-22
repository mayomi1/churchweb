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
if(!isset($_GET['eid'])){
    header("Location: editEvent.php");
}else{
    $echo = "how far nah the page is not for you";
}
if(isset($_POST['deleteEvent']) && $_SESSION['uid'] !="") {
    $eid = check($_POST['eid']);
    $deleteEvent = $_POST['deleteEvent'];
    db();
    global $link;
    veri();
    $del = mysqli_query($link, "SELECT * FROM event WHERE id=".$eid);
    if(mysqli_num_rows($del)!=0) {
        $deleteEvent = mysqli_query($link, "DELETE FROM event WHERE id=" . $eid);
        if(mysqli_affected_rows($link)==1){
            header("Location: editEvent.php");
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
            $eid = $_GET['eid'];
            ?>
        </div>
        <div class="col-md-8">
            <form action="showDeleteEvent.php?eid=<?php echo $eid;?>" method="post" >
                <label>you are sure you want to delete this events?</label>
                <input type="submit" name="deleteEvent" value="delete Event" class="btn btn-lg btn-danger">
                <input type="hidden" name="eid" value="<?php echo $eid;?>">
                <button class="btn btn-lg btn-default"><a href="editEvent.php">No take me back</a></button>
            </form>
        </div>
    </div>

</div>


<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>