<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 * a lot a thanks to www.stackoverflow.com for the 'realdate()' function 
 */

function event_select($link){


    $sql = "SELECT * FROM event ORDER BY id DESC";
    global $result;
    $result = mysqli_query($link, $sql) or die("could not execute query");
    
}

// connect to database
function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "", "oomac") or die("couldn't connect to database");
    return;
}

// check for hackers
function check($string){
   // $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
    $string  = htmlspecialchars($string);
    $string = strip_tags($string);
    $string = trim($string);
    $string = stripslashes($string);
    return $string;
    
}

// upload image
/***
 * @param $upimage = the directory to store the image
 * @param $g_picture = the posted image from the form ##the 'name' in the form is g_picture
 */
function image($upimage,$g_picture){
    global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
    global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;


    $errImageNotSet= $errNotImage=$errImageExist=$errTooLarge= $errEXT= $errNotUploaded= $errImage="";
    $messageSuccess=$messageImageName="";
    $target_dir = "$upimage";
    $g_image = $_FILES["$g_picture"]["name"];
    $target_file = $target_dir . basename($_FILES["$g_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        if(empty($g_image)){
            $errImageNotSet= "you have not selected an image yet, please select an image file you want to upload";
            $error= 1;
        }
        @$check = getimagesize($_FILES["$g_picture"]["tmp_name"]);
        if($check !== false) {
            $messageImageName= "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errNotImage= "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $errImageExist= "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["$g_picture"]["size"] > 5000000) {
        $errTooLarge= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $errEXT= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errNotUploaded= "Sorry, your file was not uploaded.";
        $error =1;
// if everything is ok, try to upload file
    } else {
        if($error!=1) {
            if (move_uploaded_file($_FILES["$g_picture"]["tmp_name"], $target_file)) {
                $messageSuccess= "The file " . basename($_FILES["$g_picture"]["name"]) . " has been uploaded.";
            } else {
                $errImage= "Sorry, there was an error uploading your file.";
            }
        }
        else
        {$errImage= "error has occur, please check and try again";}
    }

}// end of image function


//check if they are login at the beginning
function verifylogin(){
    session_start();
    if(!isset($_SESSION['uid'])){
        header("Location: ../Jesusislord.php");
        exit();
    }
}

// check if they are login any where else
function veri()
{
    if (!isset($_SESSION['uid'])) {
        header("Location: ../Jesusislord.php");
        exit();
    }
}

// welcome to mainly display the logout

function welcome()
{
    if (isset($_SESSION['uid'])) {
        $user = $_SESSION['username'];
        echo "Welcome <b>$user</b> <a href='../logout.php'>log out</a>";
    } else {
        log_form();
    }

}

// to convert the result to array so as to be able to used foreach 

function db_result_to_array($res)
{
    $res_array = array();

    for ($count=0;  $row = mysqli_fetch_array($res) ; $count++)
    {
        $res_array[$count] = $row;
    }

    return $res_array;
}
// to display the most recent blog use it with foreach 

function recentBlog(){
    db();
    global $link;

    $res = mysqli_query($link, "SELECT post_title FROM blog ORDER BY blog_id DESC LIMIT 10");
    $res = db_result_to_array($res);
    return $res;
}

// to display the content in the president column of the db in the edit part
function selection(){
    db();
    global $link;

    $res = mysqli_query($link, "SELECT * FROM president ORDER BY id DESC LIMIT 1");
    $res = db_result_to_array($res);
    return $res;
}

// to display the content in the event for editing
function event(){
    db();
    global $link;

    $res = mysqli_query($link, "SELECT * FROM event WHERE id=".$_GET['eid']);
    $res = db_result_to_array($res);
    return $res;
}

// to display the content in the blog for editing
function blogEdit(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM blog WHERE blog_id=".$_GET['ebid']);
    $res = db_result_to_array($res);
    return $res;
}

// to display the units list into tabs
//display editorial
function units_edidorial(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM units_list WHERE units='Editorial'");
    $res = db_result_to_array($res);
    return $res;
}
//display choir
function units_choir(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM units_list WHERE units='Choir'");
    $res = db_result_to_array($res);
    return $res;
}
//display ushering
function units_ushering(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM units_list WHERE units='Ushering'");
    $res = db_result_to_array($res);
    return $res;
}
//display technical
function units_technical(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM units_list WHERE units='Technical'");
    $res = db_result_to_array($res);
    return $res;
}
// display decoration
function units_decoration(){
    db();
    global $link;
    $res = mysqli_query($link, "SELECT * FROM units_list WHERE units = 'Decoration' ");
    $res = db_result_to_array($res);
    return $res;
}

// to make sure that the date is in dd/mm/yyyy format
function realDate($date){
    error_reporting(0);
    if(false===strtotime($date)){
        return false;
    }else{
        list($day, $month, $year)= explode( '/', $date);
        if(false===checkdate($day, $month, $year)){
            return false;
        }
    }
    return true;
}


function image4blog($upimage,$g_picture){
    global $g_image, $error, $errImageNotSet, $messageImageName, $errNotImage, $errImageExist;
    global $errTooLarge, $errEXT, $errNotUploaded, $messageSuccess, $errImage;


    $errImageNotSet= $errNotImage=$errImageExist=$errTooLarge= $errEXT= $errNotUploaded= $errImage="";
    $messageSuccess=$messageImageName="";
    $target_dir = "$upimage";
    $g_image = $_FILES["$g_picture"]["name"];
    $target_file = $target_dir . basename($_FILES["$g_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists
    if (file_exists($target_file)) {
        $errImageExist= "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["$g_picture"]["size"] > 5000000) {
        $errTooLarge= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $errEXT= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errNotUploaded= "Sorry, your file was not uploaded.";
        $error =1;
// if everything is ok, try to upload file
    } else {
        if($error!=1) {
            if (move_uploaded_file($_FILES["$g_picture"]["tmp_name"], $target_file)) {
                $messageSuccess= "The file " . basename($_FILES["$g_picture"]["name"]) . " has been uploaded.";
            } else {
                $errImage= "Sorry, there was an error uploading your file.";
            }
        }
        else
        {$errImage= "error has occur, please check and try again";}
    }

}// end of image function



?>