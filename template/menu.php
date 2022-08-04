<?php
$getJson = file_get_contents("template/arborescence.json");
$arborescence = json_decode($getJson);

include 'php/arborescence.class.php';
include 'php/rubrique.class.php';

$arbo = new Arborescence($arborescence);
?>

<div id="menu_principal">
    <?php foreach ($arbo->getTabRubriques() as $rubrique) { ?>
        <div class="<?=$rubrique->getClasses();?>" name="<?=$rubrique->getId();?>">
            <div class="btn-rubrique" style="background-color: <?=$rubrique->getColor();?>;">
                <div id="test">
                    <h2><?=$rubrique->getTitre();?></h2>
                </div>
                <div id="icone" style="border: 1px solid <?=$rubrique->getColor();?>;">
                    <img src="<?=$rubrique->getImage();?>">
                </div>
            </div>

            <?php foreach ($rubrique->getSousRubriques() as $sousRubrique) { ?>
                <div class="<?=$sousRubrique->getClasses();?>" name="<?=$sousRubrique->getId();?>" style="background-color: <?=$sousRubrique->getColor();?>;"><h3><?=$sousRubrique->getTitre();?></h3></div>
            <?php } ?>
        </div>
    <?php } ?>
    <div id="navigation">
        <div id="accueil">
            <h3>ACCUEIL</h3>
        </div>
        <div id="retour">
            <h3>RETOUR</h3>
        </div>
    </div>
</div>