<?php
//include "modules/meteo.php";
?>
<div id="header">
    <div id="logo">
        <img src="img/assets/logo.svg">
    </div>
    <div id="infos">
        <div id="date">
            <?=date('l d F Y');?>
            <?=date('h:i');?>
        </div>
        <?php include "modules/meteo.php"; ?>
    </div>
</div>