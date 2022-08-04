<?php
//include "modules/meteo.php";
?>
<div id="header">
    <div id="head-left">
        <img src="img/assets/logo.png">
    </div>
    <div id="head-right">
        <div id="head-right-top">
            <img src="img/assets/header.png">
        </div>
        <div id="head-right-bottom">
            <div id="date">
                <?=dateFr()?><br>
                <div id="heure_exacte"></div>
            </div>
            <?php include "modules/meteo.php"; ?>
        </div>
    </div>
</div>