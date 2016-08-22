<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
include ("include/dbconfig.php");

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

  $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die ("could not connect to database");
    
    $sql= "SELECT * FROM member WHERE username= '$username' AND password = '$password' LIMIT 1";

    $query = mysqli_query($link, $sql);
    if(mysqli_num_rows($query)==1){
        $row = mysqli_fetch_assoc($query);
        session_start();
        $_SESSION['uid'] = $row['member_id'];
        $_SESSION['username'] = $row['username'];
        header('Location: Jesusislord.php');
        exit();
    }else{
        header('Location: Jesusislord.php');
        exit();
    }

}
?>