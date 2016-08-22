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
            $sql = "SELECT * FROM event ORDER BY id DESC";
            $result = mysqli_query($link, $sql) or die("could not execute query");
            while($row=mysqli_fetch_array($result))
            {

                ?>
                <hr><div>
                <div class="vr" style="left: 770px; height: 400px "></div>

                <img src="../uploaded_image/event/<?php echo $row['event_picture'] ?>" class="img-responsive img-rounded event_margin" width="350" height="350" >

                <h1 class="event_margin"><?php echo check($row['event_name'])?></h1>
                <h4 class="event_margin"> <span class="glyphicon glyphicon-calendar"></span> <em><?php echo check($row['date'])?></em></h4>
                <button class="btn btn-lg btn-info"><?php echo "<a href='editp.php?eid=".$row['id']."'>edit event</a>"."";?></button>
                <button class="btn btn-lg btn-danger"><?php echo "<a href='showDeleteEvent.php?eid=".$row['id']."'>delete event</a>"."";?></button>

            </div>
                <?php
            }
            ?>
            <hr>
        </div>

    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
