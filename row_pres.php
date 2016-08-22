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
        <div class="col-md-9">
            <?php

            require_once ("include/dbconfig.php");
            require_once ("include/function.php");
            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");
            if(isset($_GET['id'])){
                $txt=$_GET['id'];
                $result = mysqli_query($link, "SELECT * FROM president WHERE id='$txt' " );
                if($row=mysqli_fetch_array($result)){

                     $p_address= check($row['president_address']);
            $p_image = check($row['president_picture']);

            ?>


            <div>
                <h2>President Address to the youth</h2>
                <img src="uploaded_image/presvicar/<?php echo $p_image;?>" align="left"  alt="president's picture or vicar" style="margin: 20px 20px 20px 10px;" width="350" height="450">

                    <p style="font-size: large"><?php echo"$p_address"?></p>
                

                    <?php  }
            }
            ?>
            
        </div>
            </div>
        <div class="col-md-3">
            <hr><h4>recent post</h4><hr>
            <ul>
                <?php
                $result_topic = mysqli_query($link, "SELECT post_title FROM blog ORDER BY blog_id DESC LIMIT 10") or die("topic query error");
                while ($row3=mysqli_fetch_assoc($result_topic)){
                    $title = check($row3['post_title']);
                    echo "<li>$title</li>";


                }
                mysqli_close($link)
                ?>

            </ul>
            <hr>


           <?php require_once "include/prayer_frm.php"?>
        </div>

    </div>

</div>


<!-- / container -->


<footer class="text-center" style="background-color: #000000; margin-top: 75px">
    <div class="container-fluid">
        <div class="row" style="color: #ffffff">
            <div class="col-xs-4 col-md-4 col-lg-4">
                <h2><small>contact</small></h2><hr>
                <small>Oyejide Oloyede memorial anglican church Oke-Bode Modakeke, Osun-State</small><hr>
                <p><small>Telephone</small> </p>
                <p>Email</p><hr>
                <p align="center">@2016 oomac</p><hr>
            </div>
            <div class="col-xs-4 col-md-9 col-lg-4">
                <h2><small>Weekend service</small></h2><hr>
                <p><small>
                        Modern Services
                        Saturdays 5:30 p.m.
                        Sundays 11:11 a.m.
                        Classic Services
                        Sundays 8:00 and 9:30 a.m </small></p><hr>
            </div>
            <div class="col-xs-4 col-md-4 col-lg-4">
                <h2><small>blog</small></h2><hr>
                <p><small>bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat..</small></p><hr>

            </div>
        </div>


    </div>
</footer>
<!-- / FOOTER -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
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