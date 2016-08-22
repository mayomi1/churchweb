<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */

require_once "../include/header4blog.html";
?>
<!--end of slide-->

<div class="container" style="background-color: lightgray">
    <h2>Welcome to OOMAC'S blog</h2>
    <div class="row">


        <div class="col-md-9">
            <?php

            require_once "../include/dbconfig.php";
            require_once "../include/function.php";


db();
global $link;
	$tbl_name="blog";		//db table name
	$adjacents = 6;

	// the total number of item on the table
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($link, $query));
	$total_pages = @$total_pages[num];

	/* Setup vars for query. */
	$targetpage = "index.php"; 	//name of file
	$limit = 5; 								//how many items to show per page
	@$page = $_GET['page'];
	if($page)
        $start = ($page - 1) * $limit; 			//first item to display on this page
    else
        $start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	$sql = "SELECT * FROM $tbl_name ORDER BY blog_id DESC LIMIT $start, $limit ";
	$result = mysqli_query($link, $sql);

	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1

	/*
		Now we apply our rules and draw the pagination object.
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
    {
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination.= "<a href=\"$targetpage?page=$prev\"> previous</a>";
        else
            $pagination.= "<span class=\"disabled\"> previous</span>";

        //pages
        if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                }
            }
        }

        //next button
        if ($page < $counter - 1)
            $pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
        else
            $pagination.= "<span class=\"disabled\">next </span>";
        $pagination.= "</div>\n";
    }
?>

	<?php
		while($row = mysqli_fetch_array($result))
        {

            $image = check($row['blog_image']);
            $title = check($row['post_title']);
            $content = check(substr($row['post_content'], 0, 400));
            $date = check($row['post_date']);
           // $edited_date = check($row['last_edited']);
            $post_author_id = check($row['post_author']);
            $author_result = mysqli_query($link, "SELECT member_id, username FROM member WHERE member_id = '$post_author_id'");
            if(mysqli_num_rows($author_result)==1){
                $row2=mysqli_fetch_array($author_result);
                $author = check($row2['username']);
            }


            ?>

            <hr>
            <?php if($image){ ?>
                        <img src="../uploaded_image/blog/<?php echo $row['blog_image']?>"  style='width: 450px; height: 400px'>
            
       <?php }    ?>
            <h2><?php echo "$title"?></h2>




            <p><?php echo "$content"?>
            </p>

            <button class="btn btn-success btn-lg" type="button"><?php echo
                    "<a href='view_blog.php?bid=".$row['blog_id']."'>read more</a>"."";?></button><span><em>
                        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;posted by <?php echo $author?>
                    </em></span><span>&nbsp; &nbsp; &nbsp; &nbsp;on &nbsp;  <?php echo "$date \t" ?>
            
            </p></span>



            <?php
        }
    ?><hr>

            </div>
        </div>
    </div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

</body>

<?=$pagination;
require_once "../include/footer.html";
?>

