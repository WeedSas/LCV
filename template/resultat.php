<?php

require_once('../php/visualisation_documents.php');
require_once('../php/functions.php');

//récupération de la page sur laquelle on est dans la cadre de la pagination des miniatures
if (isset($_GET["numberPage"])) {
    $currentPage  = $_GET["numberPage"];
} else {
    $currentPage = 0;
}

//récupération du pmr pour avoir le nombre de documents à afficher par page
if ($_GET['pmr'] == 'off') {
    $fileParPage = 12;
} else {
    $fileParPage = 4;
}

//récupération de la rubrique et des sous rubriques
$rub = $_GET['rubrique'];
if ($_GET["sous"] == '0') {
    $sous_rubrique = 0;
    $sousRub = null;
    $sousStat = $_GET['rubrique'];
} else {
    $sous_rubrique = $_GET["sous"];
    $getSousRub = new Fonctions();
    $sousRub = $getSousRub->sous_titre_rub($sous_rubrique);
    $sousStat = $sousRub;
};

//récupération de la variable extension pour savoir si on a un dossier
if (isset($_GET['extension'])) {
    $dossier = $_GET['extension'];
} else {
    $dossier = null;
}

$doc = new VisualisationDocuments($rub, $sousRub, $currentPage, $dossier);
if ($_GET["sous"] == '0') {
    $hauteur = "height:98%";
} else {
    $hauteur = "height:90%";
}

?>

<div class="listeFiles" style="<?= $hauteur ?>">
    <?php
    echo '<script>Stat("' . strtoupper(ETAT) . '","' . PROJET . '","' .  $_GET['rubrique'] . '","' .  $sousStat . '","Fr","Borne");</script>'; ?>
    <?= $doc->afficheListMiniature($fileParPage, $dossier); ?>
    <!--envoi des paramètres rubrique et sous-rubrique-->
    <input type="hidden" id="sousRub" name="<?= $sousRub ?>" data-rub="<?= $_GET["sous"] ?>" data-numberPage="<?= $currentPage ?>">
    <input type="hidden" id="rub" name="<?= $rub ?>">
    <div id="arrowsPagination">
        <div class="arrowsPage"> <?= $doc->previousLink($currentPage, $rub, $sous_rubrique, $fileParPage, $dossier); ?></div>
        <div id="paginated">

            <?php if ($doc->getPages($fileParPage) > 1) : ?>
                <?php
                if ($dossier != null) {
                    $pageTotal =  $doc->getPages($fileParPage - 1);
                } else {
                    $pageTotal  = $doc->getPages($fileParPage);
                }
                ?>
                Page : <?= $currentPage + 1 . ' / ' .   $pageTotal  ?>
            <?php endif ?>
        </div>
        <div class="arrowsPage">
            <?= $doc->nextLink($currentPage, $rub, $sous_rubrique, $fileParPage, $dossier); ?></div>
    </div>


</div>

<?php if ($_GET['sous'] != '0') : ?>
    <div class="retour_rubrique <?= $rub ?>" name="<?= $rub ?>">
        <div class="btnReturn">
            <div class="buttonReturnTxt">
                <span class="chevronReturn"></span>
                <span class="textReturn">RETOUR</span>
            </div>
        </div>
    </div>
<?php endif; ?>



<script>
    $(document).ready(() => {
        let sousRub = $('.retour_rubrique').attr('name');
        if (sessionStorage.getItem('pmr') == 'on') {
            if (sousRub) {
                $('.content_file').css({
                    'margin-top': '685px'
                });
            } else {
                $('.content_file').css({
                    'margin-top': '760px'
                });
            }
        } else {
            $('.content_file').css({
                'margin-top': '25'
            });
        }
    });
</script>