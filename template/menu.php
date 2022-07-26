<?php
$getJson = file_get_contents("template/arborescence.json");
$arborescence = json_decode($getJson);

include 'php/arborescence.class.php';
include 'php/rubrique.class.php';

$arbo = new Arborescence($arborescence);
?>

<div id="menu_principal">
    <?php foreach ($arbo->getTabRubriques() as $rubrique) { ?>
        <div class="rubrique <?=$rubrique->getClasses();?>" data-ru=""><?=$rubrique->getTitre();?>

            <?php foreach ($rubrique->getSousRubriques() as $sousRubrique) { ?>
                <div class="sousRubrique" data-ru=""><?=$sousRubrique->getTitre();?></div>
            <?php } ?>
            
        </div>
    <?php } ?>
</div>