<?php

/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */

require_once "../include/function.php";
require_once "../include/dbconfig.php";


$err=$message="";
$errName=$errLen=$errComm="";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $bid =$_POST['bid'];

    if($_POST['bid']==""){
        header("Location :blog.php");
        exit();
    }

    $reply_name=check($_POST['reply_name']);
    $comment = check($_POST['comment']);
    $error = 0;
    if(empty($reply_name)){
        $errName= "you must enter a name";
        $error = 1;
    }
    /**if(strlen($reply_name<1)){
        $errLen = strlen($reply_name);
        //$errLen = "your name cannot be one letter";
        $error = 1;
    }**/
    if(empty($comment)){
        $errComm= "you have not type in any comment";
        $error = 1;
    }

    if ($error != 1) {
        $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die ("could not connect to database");

        $result = mysqli_query($link, "INSERT INTO blog_reply(reply_author, reply_date,comment, blog_id)
                                      VALUES ('$reply_name', now(), '$comment', '$bid' )") or die("reply query error");
        if ($result) {
            $message= "<script type='text/javascript'>alert(\"your comment was successfully addedj\")</script>";

        } else {
            $err= "there was error entering your comment pls try again";
        }
        mysqli_close($link);

    }
}

?>





<?php
require_once "../include/header4blog.html";
?>
<!-- /.container-fluid -->

<!--end of slide-->

<div class="container" style="background-color: lightgray">
    <h3 class="well-lg alert-info">Welcome to oomac's blog</h3>
    <div class="row">
        <div class="col-md-9">
            <?php
            require_once "../include/dbconfig.php";
            require_once "../include/function.php";

            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die ("could not connect to database");
            if(isset($_GET['bid'])){
                $bid = check($_GET['bid']);

                $result = mysqli_query($link, "SELECT * FROM blog WHERE blog_id=".$bid);
                if(mysqli_num_rows($result)==1) {
                    if($row = mysqli_fetch_array($result)) {
                        $content=check($row['post_content']);
                        $title = check($row['post_title']);
                        $date = check($row['post_date']);
                        $post_author= check($row['post_author']);
                        $image = check($row['blog_image']);

                        echo "<h4>$title</h4> <hr>";
                        if($image){
                            echo '<img src="../uploaded_image/blog/'.$image.'"  style="width: 450px; height: 400px ">';
                        }
                        echo "<p>$content</p><hr>";
                    }
                }
            }
echo "<h3><label class='bg-warning'>Comment from people</label></h3>";
            $reply_result = mysqli_query($link, "SELECT * FROM blog_reply WHERE blog_id ='$bid' ORDER BY reply_id DESC ") or die("error reply query error");
            while($row_reply=mysqli_fetch_array($reply_result)){
                $reply=check($row_reply['comment']);
                $name = check($row_reply['reply_author']);
                $reply_date = check($row_reply['reply_date']);
                echo "$reply<br>&nbsp; posted by $name &nbsp;  on &nbsp; $reply_date<hr>";
            }
            ?>



            <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <label class="alert-warning">Add your comment</label>
                <span class="message"> <?php echo $message; ?></span>
                <span class="error"> <?php echo $err;?></span>



                <div class="form-group"><label for="reply_name">Your Name</label>
                            <span class="error"> <?php echo $errName, $errLen?></span>
                        <input type="text" name="reply_name" id="reply_name" class="form-control"></div>
                        <div class="form-group"><label for="comment">your comment</label>
                            <span class="error"> <?php echo $errComm;?></span>

                            <textarea name="comment" cols="75" id="comment"   rows="10" class="form-control"></textarea></div>
                        <input type="hidden" name="bid" value="<?php echo $bid;?>">
                        <input name="submit" value="add comment" type="submit" class="form-control">

            </form>

        </div>


        <div class="col-md-3" style="margin-top: 50px">


                <hr><h3>Latest post from our blog</h3><hr>
            <div>
                <?php $recentB = recentBlog();
                foreach($recentB as $row1){
                    //  echo check($row1['post_title']).'<br>';
                    $blog = check($row1['post_title']);
                    echo "<ul class='event_margin blog'><li><a href=\"blog.php\">$blog</a></li></ul>";
                }
                $link->close();
                ?>
            </div>
            <hr>
            <div style="margin-top: 25px">
                <img src="../images/cup.jpg" class="img-rounded img-responsive center-block" width="350px" height="350px" >
                <div class="carousel-caption" >
                    <a class="btn btn-info" href="../prayer_form.php">prayer request</a>
                </div>
            </div>


        </div></div>
</div>





<!-- / container -->


<?php require_once ("../include/footer.html")?>
<!-- / FOOTER -->




<!-- jQuery-->
<script src="../js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>

</body>
</html>
