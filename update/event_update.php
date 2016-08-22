<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once "../include/function.php";

verifylogin();
$err=$err1=$message="";
$errEventDate = $errEventName=$errEventDetail=$errorDate=$errD="";


if(isset($_SESSION['uid'])) {
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $event_name = check($_POST['event_name']);

        $event_date = check($_POST['event_date']);

        $event_detail = check($_POST['event_detail']);
        
        global $error;
        $error = 0;

        


        if (empty($event_name)) {
            $errEventName= "event name cannot be empty";
            $error = 1;
        }

        /**if(realDate($event_date)){
            true;
        }
        else{
            $errD = " incorrect date format should be in dd/mm/yyyy ";
            $error = 1;
        }*/

        if (empty($event_date)) {
            $errEventDate = "event date cannot be empty";
            $error = 1;
        }

        if(empty($event_detail)){
            $errEventDetail = "event details cannot be empty";
            $error = 1;
        }

        image("../uploaded_image/event/", "event_picture");

        if($error!=1) {
            include_once("../include/dbconfig.php");
            $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("could not connect to server");

            $result = mysqli_query($link, "INSERT INTO event(event_name, event_details, event_picture, date )
                VALUES ('$event_name', '$event_detail', '$g_image', '$event_date')");

            if ($result) {
                $message= "new event was successfully added";
            } else {
                $err1="an error occur";
            }

            mysqli_close($link);
        }else{
            $err = "error has occur, please check and try again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>


    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../js/jquery-ui-1.12.0.custom/jquery-ui.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

    <?php
    require_once "../include/admin.html";
    welcome();?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/story.html";
            global $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
    global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;?>
        </div>
        
        <div class="col-md-8">
            <span class="message"><?php echo $message;?></span>
            <span class="error"><?php echo $err;?></span>
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" >

                <div class="form-group">
                    <label for="event_name">Event name</label>
                    <span class="error"><?php echo $errEventName;?></span>
                    <input class="form-control" type="text" id="event_name" name="event_name" required>
                </div>
                <div class="form-group">
                    <label for="event_date">Event date</label>
                    <span class="error"><?php echo $errEventDate,$errD, $errorDate;?></span>
                    <input class="form-control" type="text" id="event_date" name="event_date" placeholder="dd/mm/yyyy" required>
                </div>
                <div class="form-group">
                    <label for="event_detail" class="form-control">Event description</label>
                    <span class="error"><?php echo $errEventDetail;?></span>
                    <textarea  class="form-control" rows="5" id="event_detail" name="event_detail"></textarea></div>
                <div class="form-group">
                    <label for="event_picture" class="form-control">Event picture</label>
                    <span class="error"><?php echo $errImageNotSet, $errNotImage, $errImageExist, $errTooLarge ,$errEXT, $errNotUploaded,  $errImage;?></span>
                    <span class="message"><?php echo $messageSuccess, $messageImageName;?></span>
                    <input type="file" id="event_picture" name="event_picture" required>
                </div>


                <input class="btn btn-info" type="submit" value="Add event">

            </form>
        </div>
    </div>
</div>


<?php require_once "../include/footer.html"?>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery-ui-1.12.0.custom/jquery-ui.js"></script>
     <script>
         $(function () {
        $("#event_date").datepicker({ dateFormat : 'dd/mm/yy' });
        })
    </script>
</body>
</html>
