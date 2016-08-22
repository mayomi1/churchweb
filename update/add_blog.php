<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once "../include/function.php";

verifylogin();
$messageSuccess=$imageTooLarge=$isImage=$isNotImage=$errorMessage=$imgExist=$notAllowed=$errorUp=$errorWithFile="";
$errContent=$errTitle=$imageUploaded=$imageFileType="";
$error = 0;
if(isset($_SESSION['uid'])) {
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $title = check($_POST['title']);
        $content = check($_POST['content']);
        
        if(empty($title)){
            $errTitle = "   please enter a title  ";
            $error = 1;
        }
        if(empty($content)){
            $errContent = "   please enter a content   ";
            $error = 1;
        }
        




        $target_dir = "../uploaded_image/blog/";
        $imagetodb = $_FILES['blog_picture']['name'];
        $target_file = $target_dir . basename($_FILES["blog_picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        //$picture = $_POST['blog_picture'];


           if(!($imagetodb)){
                db();
                global $link;
                $author = $_SESSION['uid'];
                $result = mysqli_query($link, "INSERT INTO blog(post_title, post_content, post_date, post_author) 
                                              VALUES ('$title', '$content', now(), '$author' )");
                if($result){
                    $messageSuccess =  "new blog post was successfully posted";

                }
                else{
                    $errorMessage = "an error occurred while uploading blog into database";
                }
               $link->close();
            }
        else{
            if(isset($_POST['submit'])) {
                @$check = getimagesize($_FILES["blog_picture"]["tmp_name"]);
                if ($check !== false) {
                    $isImage = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $isNotImage = "File is not an image.";
                    $uploadOk = 0;
                }
            }
// Check if file already exists
        if (file_exists($target_file)) {
            $imgExist = "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["blog_picture"]["size"] > 5000000) {
            $imageTooLarge= "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $notAllowed= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0 && $error != 1) {
            $errorUp= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["blog_picture"]["tmp_name"], $target_file)) {
                $imageUploaded = "The file " . basename($_FILES["blog_picture"]["name"]) . " has been uploaded.";

                db();
                global $link;
                $author = $_SESSION['uid'];
                $result = mysqli_query($link, "INSERT INTO blog(post_title, post_content, post_date, post_author, blog_image) 
                                              VALUES ('$title', '$content', now(), '$author', '$imagetodb' )");
                if ($result) {
                    $messageSuccess = "new blog post was successfully posted";

                } else {
                    $errorMessage = "an error occur while uploading blog into the database";
                }
                $link->close();

            } else {
                $errorWithFile = "Sorry, there was an error uploading your file.";
            }
        }
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
           ?>
        </div>

        <div class="col-md-8">
            <span class="message"><?php echo $messageSuccess;?></span>
            <span class="error"><?php echo $errorMessage , $errorUp, $errorWithFile;?></span>
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" >

                <div class="form-group">
                    <label for="title">Title</label>
                    <span class="error"><?php echo $errTitle;?></span>
                    <input class="form-control" type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content" class="form-control">Content</label>
                    <span class="error"><?php echo $errContent;?></span>
                    <textarea  class="form-control" rows="5" id="content" name="content"></textarea></div>
                <div class="form-group">
                    <label for="blog_picture" class="form-control">Blog picture if there is image</label>

                    <input type="file" id="blog_picture" name="blog_picture" >
                    <span class="error"><?php echo $isNotImage, $imgExist, $isImage, $imageFileType, $imageUploaded , $notAllowed;?></span>
                </div>


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
