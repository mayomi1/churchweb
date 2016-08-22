<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once ("include/header.html");
require_once "include/function.php";
$errName=$errRequest=$error1=$message="";
if($_SERVER['REQUEST_METHOD']=="POST"){

    $name = check($_POST['name']);
    $request = check($_POST['request']);
    $error = 0;
    if(empty($name)) {
        $errName = "please fill in this option";
        $error = 1;
    }
    if(empty($request)){
        $errRequest = "please fill in this option";
        $error = 1;
    }

    if($error != 1){
    db();
    global $link;
    $result = mysqli_query($link, "INSERT INTO prayer_request(name_of_sender, prayer_request) 
                                              VALUES ('$name', '$request')") or die("query error")   ;
        if($request){
            $message = "  your prayer request has been received and \n will be attend to as soon as possible  ";
        }else{
            $error1 = "  sorry and error has occur please try again  ";
        }


    }

    // send the mail to the reciever email
    /**
    $toaddress = "oomac@whatever.com";
    $fromaddress = "prayer_request@oomac.com";
    mail($toaddress, $name, $request, $fromaddress);
**/

}


?><!--end of slide-->

<div class="container">
    <span class="error"><?php echo $error1 ?></span>
    <span class="message"><?php echo $message ?></span>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="form-group">
            <label>Name</label>
            <span class="error"><?php echo $errName ?></span>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>your request</label>
            <span class="error"><?php echo $errRequest ?></span>
            <textarea name="request" class="form-control" cols="75" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="submit">submit request</button>
    </form>
</div>

<?php 
require_once ("include/footer.html");
?>