<?php session_start()
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="login/css/reset.css">
    <link rel="stylesheet" href="login/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

        <?php 
        require_once "include/admin.html";
        
        
        function log_form(){
        if(!isset($_SESSION['uid'])){
                        echo ' 
    <div class="wrap">
		   <div class="avatar">
               <img src="img/2.jpg"></div>
              <form action="loggin.php" method="post">
                 <input type="text" placeholder="username" required name="username">
		          <div class="bar">
			            <i></i>
		            </div>
		        <input type="password" placeholder="password" required name="password">
		        <a href="" class="forgot_link">forgot ?</a>
		        <button class="log">Sign in</button></form>
		</div>
	
	</div>';





            require_once "include/footer.html";
        exit();
        }
        }

        log_form();









        if(isset($_SESSION['uid'])){
            $user = $_SESSION['username'];
            echo "Welcome <b>$user</b> <a href='logout.php'>log out</a>" ;
        }
        else{
            log_form();
        }
            

        ?>
    
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class=" list-group-item list-group-item-danger"> <a href="update/pres.php">update president address</a></li>
                <li class=" list-group-item list-group-item-success"> <a href="update/vicar_update.php">update vicar address</a></li>
                <li class="list-group-item list-group-item-info"> <a href="update/event_update.php">update events</a></li>
                <li class="list-group-item list-group-item-warning"> <a href="update/gallery_update.php">update church gallery</a></li>
                <li class="list-group-item list-group-item-danger"> <a href="update/units_update.php">update units</a></li>
                <li class=" list-group-item list-group-item-info"> <a href="update/add_blog.php">update blog</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class=" list-group-item list-group-item-danger"> <a href="edit/editPres.php">edit president address</a></li>
                <li class=" list-group-item list-group-item-success"> <a href="edit/editVicar.php">edit vicar address</a></li>
                <li class="list-group-item list-group-item-info"> <a href="edit/editEvent.php">edit events</a></li>
                <li class="list-group-item list-group-item-warning"> <a href="edit/editBlog.php">edit blogs</a></li>
                <li class="list-group-item list-group-item-warning"> <a href="edit/deleteImage.php">delete Image from gallery</a></li>
                <li class="list-group-item list-group-item-warning"> <a href="edit/deleteUnits.php">delete a member from units</a></li>

            </ul>
        </div>
    </div>
</div>




<?php require_once "include/footer.html"?>

<!-- jQuery-->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>