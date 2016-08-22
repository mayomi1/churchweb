<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */


require_once "../include/function.php";
verifylogin();
$err=$message=$errEmpty=$errM="";

if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['uid'] !="") {

    $name1 = check($_POST['name1']);
    $name2 = check($_POST['name2']);
    $name3 = check($_POST['name3']);

    $units1 = $_POST['units1'];
    $units2 = $_POST['units2'];
    $units3 = $_POST['units3'];

    $error = 0;
    if (empty($name1) && empty($name2) && empty($name3)) {
        $errEmpty = "(hint:  add a member) ";
        $error = 1;
    }
    if ($error != 1 && $_SESSION['uid']!="") {
        require_once("../include/dbconfig.php");
        $link = mysqli_connect($host, $userdb, $passdb, $datadb) or die("cannot connect to database");

        if(!empty($name1)){
            $reqult = mysqli_query($link, "INSERT INTO units_list( name, units) 
                        VALUES ('$name1', '$units1')");
        }
        if(!empty($name2)){
            $reqult1 = mysqli_query($link, "INSERT INTO units_list( name, units) 
                        VALUES ('$name2', '$units2')");
        }
        if(!empty($name3)) {
            $reqult2 = mysqli_query($link, "INSERT INTO units_list( name, units) 
                        VALUES ('$name3', '$units3')");
        }
        if (@$reqult || @$reqult1 || @$reqult2) {
            $message = "new units list was successfully added ";
        } else {
            $err = " an error occur while updating please try again ";
        }
        mysqli_close($link);
    }
    else {
        $errM = " an error has occur please check and try again ";
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
welcome()?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php require_once "../include/story.html"?>

        </div>

        <div class="col-md-8">
            <span class="error"> <?php echo $err, $errM, $errEmpty;?></span>
            <span class="message"> <?php echo $message?></span>

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="form-group">
                    <label for="editor">name of OOMAC YOUTHS member</label>
                    <input class="form-control" type="text" id="editor" name="name1">
                    <select id="editor" class="form-control" name="units1">
                        <option>Editorial</option>
                        <option>Choir</option>
                        <option>Ushering</option>
                        <option>Technical</option>
                        <option>Decoration</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="editor">name of OOMAC YOUTHS member</label>
                    <input class="form-control" type="text" id="editor" name="name2">
                    <select name="units2" id="editor" class="form-control">
                        <option>Editorial</option>
                        <option>Choir</option>
                        <option>Ushering</option>
                        <option>Technical</option>
                        <option>Decoration</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="editor">name of OOMAC YOUTHS member</label>
                    <input class="form-control" type="text" id="editor" name="name3">
                    <select id="editor" class="form-control" name="units3">
                        <option>Editorial</option>
                        <option>Choir</option>
                        <option>Ushering</option>
                        <option>Technical</option>
                        <option>Decoration</option>
                    </select>
                </div>

                <div>
                    <input type="submit" value="add member" name="submit" class="btn btn-info">
                </div>

            </form>
        </div>
    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>