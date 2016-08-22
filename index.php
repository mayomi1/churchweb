<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once ("include/header.html");
?>

<!-- /.container-fluid -->

<div class="container" style="background-color: lightgray" >
    <div class="row">



        <?php
        require_once "include/function.php";
        include ("include/dbconfig.php");
        $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to database");

        $sql = "SELECT * FROM president ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($link, $sql) or die("couldnt execute query");

        if($result){
        $row = mysqli_fetch_array($result);

        $president_message = check(substr($row['president_address'], 0 , 500));


        $president_image =$row['president_picture'];

        $vicar_message = check(substr($row['vicar_adress'],0 , 500));


        $vicar_picture = $row['vicar_picture'];
        ?>



        <div class="col-md-4" style="margin-top: 50px">


                <img src="uploaded_image/presvicar/<?php echo $row['vicar_picture'];?>" class="img-responsive img-thumbnail" alt="president's picture or vicar" style="350px; height: 450px">
                <div class="caption">
                    <h2>Vicar address</h2><hr>
                    <p><?php echo"$vicar_message"?></p>
                    <botton type="botton" class="btn btn-success btn-lg"><?php echo "<a href='row_vicar.php?id=".$row['id']."'>read more</a>"."";?></botton>
                </div>

        </div>

        <div class="col-md-4" style="margin-top: 50px">
            <div>



                <img src="uploaded_image/presvicar/<?php echo $row['president_picture']?>" class="img-responsive img-thumbnail" alt="president's picture or vicar" style="width: 350px; height: 450px;" >
                <div class="caption">
                    <h2>President address</h2><hr>
                    <p><?php echo $president_message;?></p>
                    <botton type="botton" class="btn btn-success btn-lg"><?php echo "<a href='row_pres.php?id=".$row['id']."'>read more</a>"."";?></botton>
                    <?php }
                    mysqli_close($link);
                    ?>

                </div>
            </div>
        </div>


        <div class="col-md-4">

            <h1>QUICK INFO</h1><br><br><hr>
            <ul><li>WEEKEND MEETING</li>
                <li>Choir practices</li>
                <li>Saturday, 4:00 & 6:00 pm</li>
                <li>meetings</li>
                <li> Saturday, 5:00 pm</li>
                <li>Sunday, 9:00 & 11:00 am</li>
                <li>meetings</li>
                <li>Sunday, 9:00 & 11:00 </li>

                <li>MIDWEEK SERVICES</li>
                <li>Wednesday, 6:30 pm church auditorium</li>
            </ul><br><br><br>
            <div class="panel panel-success panel-heading">
                <h3>Latest post from our blog</h3><hr></div>
            <div class="list-group">
                <?php $recentB = recentBlog();
                foreach($recentB as $row1){
                  //  echo check($row1['post_title']).'<br>';
                    $blog = check($row1['post_title']);
                   echo '<a class="list-group-item" href="blog/">'.$blog.'</a>';
                }
                $link->close();
                ?>
            </div>


        </div>

    </div>
    <hr>


    <div class="row">



        <div class="col-md-8" style="margin-top: 50px">
            <div style="background-color: lightslategrey">
                <div class="jumbotron">
                    <h2 align="center">IMAGES FROM OUR GALLERY</h2>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">

                        <?php
                        include ("include/dbconfig.php");
                        $link=mysqli_connect($host, $userdb, $passdb, $datadb) or die("couldn't connect of database");
                        $result = mysqli_query($link,"SELECT * FROM gallery ORDER BY id DESC LIMIT 15") or die("query not executed");
                        while($row=mysqli_fetch_array($result)){
                            ?>

                            <a href="uploaded_image/gallery/<?php echo $row['image']?>" class="fancybox" rel="gall"> <img style="height: 140px; width: 140px" src="uploaded_image/gallery/<?php echo $row['image'] ?>" class="img-responsive img-thumbnail" /></a>
                            <?php
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div><!--end of gallery-->
            </div>
            </div>




        <div class="col-md-4" style="margin-top: 50px">
            <table class="table table-responsive table-hover" >
                <th>Upcoming Events</th>
                <tr>
                    <td><strong>Event name</strong></td>
                    <td><strong>Event date</strong></td>
                    <?php
                    include "include/dbconfig.php";
                    $link=mysqli_connect($host, $userdb, $passdb, $datadb) or die("couldn't connect of database");
                    $result = mysqli_query($link, "SELECT * FROM event ORDER BY id DESC LIMIT 5") or die ("query not successful");
                    while($row=mysqli_fetch_array($result)){
                    ?>

                </tr>
                <tr>
                    <td><?php echo check($row['event_name'])?></td>
                    <td><?php echo check($row['date'])?></td>
                </tr>
                <?php
                }
                ?>
            </table>

<hr>
            <?php require_once "include/prayer_frm.php"?>

        </div>

        </div>



    </div>


    <!-- / container -->
<?php require_once ("include/footer.html")?>
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
