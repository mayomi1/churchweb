<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once ("include/otherheader.html");
?>
<!--end of slide-->

<div class="container" style="background-color: lightgray">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <?php
            include ("include/dbconfig.php");
            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");

            $sql = "SELECT * FROM gallery ORDER BY id DESC ";
            $result = mysqli_query($link, $sql) or die("couldnt execute query");

            while($row=mysqli_fetch_array($result)){
                ?>
                <a href="uploaded_image/gallery/<?php echo $row['image'] ?>" class="fancybox" rel="gal"><img style="width: 250px ; height: 250px" src="uploaded_image/gallery/<?php echo $row['image'] ?>" class="img-thumbnail img-responsive"/></a>

            <?php
            }
            ?>
        </div>
    </div>
</div>


<!-- / container -->

<?php require_once ("include/footer.html")?>
<!-- / FOOTER -->





<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/fancyapps/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="js/fancyapps/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript"></script>
<script>
    $(function () {
        $(".fancybox").fancybox();
    })
</script>

</body>
</html>