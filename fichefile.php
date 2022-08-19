<?php
require_once('php/visualisation_documents.php');
require_once('php/function.class.php');

$rub = $_POST['rub'];
$sous_rubrique = $_POST["sousRub"];
$numberPage = $_POST['numberPage'];
$name = $_POST['name'];
$urlPdf = $_POST['urlPdf'];


//vérification si on est dans un dossier et envoi du nom du dossier à la classe PHP
if(isset($_POST['isNameDossier'])){
    $dossier =$_POST['isNameDossier'] ;
}else{
    $dossier =null;
}
$doc = new VisualisationDocuments($rub, $sous_rubrique, $numberPage, $dossier);
$extension = $doc->GetExtension($name);

?>

<div id="ficheFile">


    <?= $doc->afficheFiles($name, $extension, $urlPdf); ?>
    <div id="returnListeFiles" data-sous="<?= $_POST['nameSousRub'] ?>" data-extension="<?= $dossier?>">
        <div id="iconeReturn"></div>
    </div>
</div>