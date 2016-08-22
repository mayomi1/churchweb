<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();
require_once "../include/admin.html";
//log out is inside the welcome function
welcome();?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/superstory.html"?>
        </div>
        <div class="col-md-8">
            <?php
            db();
            global $link;
            $result=mysqli_query($link, "SELECT * FROM blog ORDER BY blog_id DESC ");
            while($row=mysqli_fetch_array($result)){
                $image = check($row['blog_image']);
                $title = check($row['post_title']);
                $content = check(substr($row['post_content'], 0, 700));
                $date = check($row['post_date']);

                $post_author_id = check($row['post_author']);
                $author_result = mysqli_query($link, "SELECT member_id, username FROM member WHERE member_id = '$post_author_id'");
                if(mysqli_num_rows($author_result)==1){
                    $row2=mysqli_fetch_array($author_result);
                    $author = check($row2['username']);
                }
                ?>
                <hr>
                <h2><?php echo "$title"?></h2>
                <p><?php echo "$content"?>
                </p>
                <button class="btn btn-success btn-lg" type="button"><?php echo
                        "<a href='showBlog.php?ebid=".$row['blog_id']."'>edit blog</a>"."";?></button><span><em>
                        <button class="btn btn-danger btn-lg" type="button"><?php echo
                                "<a href='deleteBlog.php?ebid=".$row['blog_id']."'>delete blog</a>"."";?></button><span><em>
                        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;posted by <?php echo $author?>
                    </em></span><span>&nbsp; &nbsp; &nbsp; &nbsp;on &nbsp;  <?php echo "$date \t"?>
                    </p></span>
                <?php
            }
            ?><hr>

        </div>

    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
