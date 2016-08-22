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
            
            $sql = "SELECT * FROM gallery ORDER BY id DESC ";
            $result = mysqli_query($link, $sql) or die("couldnt execute query");

            while($row=mysqli_fetch_array($result)){
                $gid = $row['id'];
                ?>
                <a href="../uploaded_image/gallery/<?php echo $row['image'] ?>" class="fancybox" rel="gal"><img style="width: 250px ; height: 250px" src="../uploaded_image/gallery/<?php echo $row['image'] ?>" class="img-thumbnail img-responsive"/></a>
                <button class="btn btn-danger btn-sm"><a href="deleteShowImage.php?gid=<?php echo $gid?>">delete image</a></button>
                <?php
            }
            ?>


        </div>u

    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
