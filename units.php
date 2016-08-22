<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */
require_once "include/function.php";
require_once "include/header.html";
?>

<!--end of slide-->

<div class="container" style="background-color: lightgray">

    <div class="well-lg bg-success"><h2>Lists of youth units member</h2></div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#choir" aria-controls="choir" role="tab" data-toggle="tab">choir units</a></li>
                    <li role="presentation"><a href="#ushering" aria-controls="ushering" role="tab" data-toggle="tab">Ushering units</a></li>
                    <li role="presentation"><a href="#editorial" aria-controls="editorial" role="tab" data-toggle="tab">Editorial units</a></li>
                    <li role="presentation"><a href="#technical" aria-controls="technical" role="tab" data-toggle="tab">technical units</a></li>
                    <li role="presentation"><a href="#decoration" aria-controls="decoration" role="tab" data-toggle="tab">Decoration units</a></li>
                </ul>


                <!-- Tab panes -->
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="choir">

                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <?php foreach (units_choir() as $unit){echo $unit['name'].'<br>'; } ?>
                            </li>
                        </ul>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="ushering">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <?php foreach (units_ushering() as $unit){echo $unit['name'].'<br>'; } ?>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="editorial">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <?php foreach (units_edidorial() as $unit){echo $unit['name'].'<br><hr>'; } ?>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="technical">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <?php foreach (units_technical() as $unit){echo $unit['name'].'<br><hr>'; } ?>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="decoration">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <?php foreach (units_decoration() as $unit){echo $unit['name'].'<br><hr>'; } ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>




            </div>
        </div>
    </div>


</div>
<?php require_once ("include/footer.html")?>
<!-- / FOOTER -->

<!-- jQuery-->
<script src="js/jquery.js"></script>
<script src="js/me.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>