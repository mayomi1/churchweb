<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();


if(!isset($_GET['eid'])){
header("Location: editEvent.php");
}
$err=$err1=$message="";
$errEventDate = $errEventName=$errEventDetail=$errorDate=$errD="";
$messageN=$messageD=$messageDe=$messageP="";
$errN=$errD=$errDe=$errP="";

global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;

if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid'] !="") {
    $eid = check($_POST['eid']);
    db();
    global $link;



    $event_name = check($_POST['event_name']);
    $event_detail =check($_POST['event_detail']);
    $event_date = check($_POST['event_date']);

    if (empty($event_name)) {
        $errEventName= "event name cannot be empty";
        $error = 1;
    }

    if(realDate($event_date)){
        true;
    }
    else{
        $errD = " incorrect date format should be in dd/mm/yyyy ";
        $error = 1;
    }

    if (empty($event_date)) {
        $errEventDate = "event date cannot be empty";
        $error = 1;
    }

    if(empty($event_detail)){
        $errEventDetail = "event details cannot be empty";
    }

    image("../uploaded_image/event/", "e_p");

   if($error!=1){
       $result = mysqli_query($link, "SELECT * FROM event WHERE id=".$eid);
       if (mysqli_num_rows($result) != 0) {
        $updateName = mysqli_query($link, "UPDATE event SET event_name = '$event_name' WHERE id=" . $eid);
        if (mysqli_affected_rows($link) == 1) {
            $messageN = " Event name was successfully edited ";
        } else {
            $errN = " Event name not changed ";
        }
        $updateDate = mysqli_query($link, "UPDATE event SET date = '$event_date' WHERE id=" . $eid);
        if (mysqli_affected_rows($link) == 1) {
            $messageD = " Event Date was successfully edited ";
        } else {
            $errD = " Event date not changed ";
        }
        $updateDetail = mysqli_query($link, "UPDATE event SET event_details = '$event_detail' WHERE id=" . $eid);
        if (mysqli_affected_rows($link) == 1) {
            $messageDe = " Event Details was successfully edited ";
        } else {
            $errDe = " Event detail not changed ";
        }
    }
        if($error != 1) {
            $updatepics = mysqli_query($link, "UPDATE event SET event_picture = '$g_image' WHERE id=" . $eid);
            if (mysqli_affected_rows($link) == 1) {
                $messageP = " event image was successfully changed ";
            } else {
                $errP = " Image not changed ";
            }
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
            $eid = $_GET['eid'];
            ?>
        </div>
        <div class="col-md-8">
            <span class="message"><?php echo $messageN, $messageDe, $messageD, $messageP;?></span>
            <span class="error"><?php echo $errN, $errDe, $errD, $errP;?></span>
            <form enctype="multipart/form-data" action="editp.php?eid=<?php echo $eid ?>" method="post" >
                <div class="form-group">
                    <label for="event_name">Event name</label>
                    <input class="form-control" type="text" id="event_name" name="event_name" required 
                           value="<?php foreach (event() as $event){ echo $event['event_name'];global $link; $link->close();}?>"
                    >
                </div>
                <div class="form-group">
                    <label for="event_date">Event date</label>
                    <span class="error"><?php echo $errEventDate, $errorDate;?></span>
                    <input class="form-control" type="text" id="event_date" name="event_date" placeholder="dd/mm/yyyy" required 
                           value="<?php foreach (event() as $event){ echo $event['date']; global $link; $link->close();}?>"
                    >
                </div>
                <div class="form-group">
                    <label for="event_detail">Event description</label>
                    <span class="error"><?php echo $errEventDetail;?></span>
                    <textarea  class="form-control" rows="25" cols="60" id="event_detail" name="event_detail">
                        <?php foreach (event() as $event){ echo $event['event_details']; global $link; $link->close();}?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="e_p"></label>
                     <span class="error"><?php echo $errImage, $errImageNotSet, $errNotImage, $errImageExist,
                         $errTooLarge, $errEXT, $errNotUploaded, $errImage; ?></span>
                    <input type="file" name="e_p" id="e_p" class="form-control">

                </div>
                <input type="hidden" value="<?php echo $_GET['eid'];?>" name="eid">

                <input class="btn btn-info" type="submit" value="Add event">
            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>

