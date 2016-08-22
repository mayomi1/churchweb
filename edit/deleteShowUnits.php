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

if(!isset($_GET['ulid']) && !is_numeric($_GET['ulid'])){
    header("Location: deleteUnits.php");
}else{
    $echo = "how far nah the page is not for you";
}

if(isset($_POST['deleteUnit']) && $_SESSION['uid'] !="") {
    $ulid = check($_POST['ulid']);
    echo $ulid;
    db();
    global $link;
    veri();
    $del = mysqli_query($link, "SELECT * FROM units_list WHERE id=".$ulid);
    if(mysqli_num_rows($del)!=0) {
        $deleteUnit = mysqli_query($link, "DELETE FROM units_list WHERE id=" . $ulid);
        if(mysqli_affected_rows($link)==1){
            header("Location: deleteUnits.php");
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
            if(isset($_GET['ulid']) && is_numeric($_GET['ulid'])) {
                $ulid = $_GET['ulid'];
            }else{
                header("Location : deleteUnits.php");
            }
            ?>
        </div>
        <div class="col-md-8">
            <form action="deleteShowUnits.php?ulid=<?php global $ulid; echo $ulid;?>" method="post" >
                <label>you are sure you want to delete this member?</label>
                <input type="submit" name="deleteUnit" value="delete member" class="btn btn-lg btn-danger">
                <input type="hidden" name="ulid" value="<?php echo $ulid;?>">
                <button class="btn btn-lg btn-default"><a href="deleteUnits.php">No take me back</a></button>
            </form>
        </div>
    </div>

</div>


<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>