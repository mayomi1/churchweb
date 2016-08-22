<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once "include/function.php";
require_once ("include/otherheader.html");

?>


    <!-- /.container-fluid -->

<!--end of slide-->
<div class="container" style="background-color: lightgray">
    <div class="row">
        <div class="col-md-7">
            <?php require_once ("include/dbconfig.php");

            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");
            $sql = "SELECT * FROM event ORDER BY id DESC";
            $result = mysqli_query($link, $sql) or die("could not execute query");
            while($row=mysqli_fetch_array($result))

            {


                ?>



            <hr><div>
                <div class="vr" style="left: 660px; height: 400px "></div>

                <img src="uploaded_image/event/<?php echo $row['event_picture'] ?>" class="img-responsive img-rounded event_margin" width="350" height="350" >

                <h1 class="event_margin"><?php echo check($row['event_name'])?></h1>
                <h4 class="event_margin"> <span class="glyphicon glyphicon-calendar"></span> <em><?php echo check($row['date'])?></em></h4>
            </div>



                <?php

            }
            ?>
            <hr>
        </div>
        
        <div class="col-md-5">

            <h3 class="event_margin">Recent add post from blog</h3>


                <?php

                $res = mysqli_query($link, "SELECT post_title FROM blog ORDER BY blog_id DESC LIMIT 10");
                while ($row1=mysqli_fetch_array($res)){
                    $blog= check($row1['post_title']);

                    echo '<ul class="event_margin blog"><li><a href="blog/">'.$blog.'</a></li></ul>';

                } ?>

<!--prayer request-->
            <?php require_once "include/prayer_frm.php"?>




            
        </div>
    </div>

</div>


<!-- / container -->
<?php require_once ("include/footer.html")?>
<!-- / FOOTER -->


<!-- jQuery-->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>