<?php
//include "modules/meteo.php";
?>
<div id="header">
    <div id="head-left">
        <img src="img/assets/logo.svg">
    </div>
    <div id="head-right">
        <div id="head-right-top">
            <img src="img/assets/header.png">
        </div>
        <div id="head-right-bottom">
            <div id="date">
                <?=dateFr()?>
                |
                <?=date('h:i');?>
            </div>
            <?php include "modules/meteo.php"; ?>
        </div>
    </div>
</div>