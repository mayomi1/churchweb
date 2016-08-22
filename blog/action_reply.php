<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */




require_once "../include/function.php";
require_once "../include/dbconfig.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $bid =$_POST['bid'];
    $err=$message="";
    $errName=$errLen=$errComm="";
    
    $reply_name=check($_POST['reply_name']);
    $comment = check($_POST['comment']);
    $error = 0;
    if(empty($reply_name)){
        $errName= "you must enter a name";
        $error = 1;
    }
    if(strlen($reply_name==1)){
        $errLen= "your name cannot be one letter";
        $error = 1;
    }
    if(empty($comment)){
        $errComm= "you have not type in any comment";
        $error = 1;
    }

    if ($error != 1) {
        $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die ("could not connect to database");

        $result = mysqli_query($link, "INSERT INTO blog_reply(reply_author, reply_date,comment, blog_id)
                                      VALUES ('$reply_name', now(), '$comment', '$bid' )") or die("reply query error");
        if ($result) {
            echo "<script type='text/javascript'>alert(\"success\")</script>";
            
        } else {
            echo "there was error entering your comment pls try again";
        }
        mysqli_close($link);

    }
}

?>