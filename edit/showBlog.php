<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();
$messageT=$messageC="";
$errT=$errC=$errcontent=$errtitle="";


if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid'] !="") {
    $ebid = check($_POST['ebid']);
    db();
    global $link;

    $blog_title = check($_POST['blog_t']);
    $blog_content =check($_POST['blog_cont']);

    if(empty($blog_title)){
        $errtitle= "title must be set";
        $error = 1;

    }
    if(empty($blog_content)){
        $errcontent= "content must be set";
        $error = 1;
    }

    $result = mysqli_query($link, "SELECT * FROM blog WHERE blog_id=".$ebid);
    if (mysqli_num_rows($result) != 0) {
        $updateName = mysqli_query($link, "UPDATE blog SET  post_title = '$blog_title' WHERE blog_id=".$ebid);
        if (mysqli_affected_rows($link) == 1) {
            $messageT= " blog title was successfully edited ";
        }else{
            $errT=" blog title not changed ";
        }

        $updateContent = mysqli_query($link, "UPDATE blog SET  post_content = '$blog_content' WHERE blog_id=".$ebid);
        if (mysqli_affected_rows($link) == 1) {
            $messageC= " blog content was successfully edited ";
        }else{
            $errC=" blog content not changed ";
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
            <?php require_once "../include/superstory.html";
            $ebid = $_GET['ebid'];
            ?>
        </div>
        <div class="col-md-8">
            <span class="message"><?php echo $messageT, $messageC;?></span>
            <span class="error"><?php echo $errC, $errT; ?></span>
            <form enctype="multipart/form-data" action="showBlog.php?ebid=<?php echo $ebid ?>" method="post" >
                <div class="form-group">
                    <label for="blog_t">blog title</label>
                    <span class="error"><?php echo $errtitle;?></span>
                    <input class="form-control" type="text" id="blog_t" name="blog_t" required
                           value="<?php foreach (blogEdit() as $blog){ echo $blog['post_title'];
                           global $link; $link->close(); }?>"
                    >
                </div>


                <div class="form-group">
                    <label for="blog_cont">blog content</label>
                    <span class="error"><?php echo $errcontent;?></span>
                    <textarea required class="form-control" id="blog_cont" name="blog_cont" cols="70" rows="30">
                           <?php foreach (blogEdit() as $blog){ echo $blog['post_content'];
                               global $link; $link-> close(); }?>
                    </textarea>
                </div>

                <input type="hidden" value="<?php echo $_GET['ebid'];?>" name="ebid">

                <input class="btn btn-info" type="submit" value="Add event">
                <button><a href="showReply.php?ebid=<?php echo $_GET['ebid'];?>">Delete reply under post</a></button>
            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>

