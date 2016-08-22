<?php

/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */

require_once "../include/function.php";



echo "<h3><label class='bg-warning'>Comment from people</label></h3>";
db();
global $link;
$ebid = $_GET['ebid'];
$reply_result = mysqli_query($link, "SELECT * FROM blog_reply WHERE blog_id ='$ebid' ORDER BY reply_id DESC ") or die("error reply query error");
if(mysqli_num_rows($reply_result)!=0) {
    while ($row_reply = mysqli_fetch_array($reply_result)) {
        $reply = check($row_reply['comment']);
        $erid = $row_reply['reply_id'];
        $name = check($row_reply['reply_author']);
        $reply_date = check($row_reply['reply_date']);
        echo "$reply<br>&nbsp; posted by $name &nbsp;  on &nbsp; $reply_date";
        echo '<button><a href="deleteShowReply.php?ebid='.$ebid.'&erid=' . $erid . ' ">Delete reply</a></button><hr>';
    }
}else{
    echo "<h1>no reply for this post yet</h1>";
}
?>