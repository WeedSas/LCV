<?php
$getJson = file_get_contents("template/arborescence.json");
$arborescence = json_decode($getJson);

include 'php/arborescence.class.php';
include 'php/rubrique.class.php';

$arbo = new Arborescence($arborescence);
?>

<div id="menu_principal">
    <?php foreach ($arbo->getTabRubriques() as $rubrique) { ?>
        <div class="<?=$rubrique->getClasses();?>" data-ru="<?=$rubrique->getId();?>"><h2><?=$rubrique->getTitre();?></h2>
            <img src="<?=$rubrique->getImage();?>">

            <?php foreach ($rubrique->getSousRubriques() as $sousRubrique) { ?>
                <div class="<?=$sousRubrique->getClasses();?>" data-ru=""><h3><?=$sousRubrique->getTitre();?></h3></div>
            <?php } ?>

        </div>
    <?php } ?>
</div>