<?php
/**
 * codes written by Ayandiran Mayomi
 * 07036725156
 * ayandiranmayomi@gmail.com
 *instagram ::: @mayomi1
 */

require_once "../include/function.php";
verifylogin();
require_once "../include/admin.html";
//log out is inside the welcome function
welcome();?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-4">
            <?php require_once "../include/superstory.html";   ?>
        </div>
        <div class="col-md-8 col-xs-8">
            <div class="tabs">
                <ul class="tabs-nav">
                    <li><a class="tabs-a" href="#tab-1">Editorial</a></li>
                    <li><a class="tabs-a" href="#tab-2">Ushering</a></li>
                    <li><a class="tabs-a" href="#tab-3">Choir</a></li>
                    <li><a class="tabs-a" href="#tab-4">Technical</a></li>
                    <li><a class="tabs-a" href="#tab-3">Choir</a></li>
                    <li><a class="tabs-a" href="#tab-3">Choir</a></li>
                    <li><a class="tabs-a" href="#tab-3">Choir</a></li>
                </ul>
                <div class="tabs-stage">
                    <div id="tab-1">
                        <p><?php foreach (units_edidorial() as $unit){echo $unit['name'] .'<br>
                        <button class="btn btn-danger btn-sm"><a href="deleteShowUnits.php?ulid='.$unit['id'].'">delete unit member</a></button><br>';$ulid = $unit['id'];} ?></p>

                    </div>
                    <div id="tab-2">
                        <p><?php foreach (units_ushering() as $unit){echo $unit['name'].'<br>
                        <button class="btn btn-danger btn-sm"><a href="deleteShowUnits.php?ulid='.$unit['id'].'">delete unit member</a></button><br>';$ulid = $unit['id'];} ?></p>

                    </div>
                    <div id="tab-3">
                        <p><?php foreach (units_choir() as $unit){ echo $unit['name'].'<br>
                        <button class="btn btn-danger btn-sm"><a href="deleteShowUnits.php?ulid='.$unit['id'].'">delete unit member</a></button><br>';$ulid = $unit['id'];} ?></p>
                    </div>

                    <div id="tab-4">
                        <p><?php foreach (units_technical() as $unit){ echo $unit['name'].'<br>
                        <button class="btn btn-danger btn-sm"><a href="deleteShowUnits.php?ulid='.$unit['id'].'">delete unit member</a></button><br>';$ulid = $unit['id'];} ?></p>
                    </div>
                    
                </div>
            </div>


        </div>

    </div>
</div>

<?php require_once "../include/footer.html"?>


<script src="../js/jquery.js"></script>
<script src="../js/me.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
