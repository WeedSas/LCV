<?php

include_once('meteo/meteo_v2.class.php');

//===============================================//
//  Tableau de définition des différentes images //
//  et couleurs en fonction des prévisions météo //
//===============================================//
$tab_meteo = array(
    "soleil" => array(
        "fond" => "1.svg",
        "plus" => "meteo_plus_jaune.png",
        "color" => "#FFFFFF"
    ),
    "couvert" => array(
        "fond" => "5.svg",
        "plus" => "meteo_plus_bleu.png",
        "color" => "#FFFFFF"
    ),
    "nuageux" => array(
        "fond" => "4.svg",
        "plus" => "meteo_plus_gris-clair.png",
        "color" => "#FFFFFF"
    ),
    "pluie" => array(
        "fond" => "7.svg",
        "plus" => "meteo_plus_gris-clair.png",
        "color" => "#FFFFFF"
    ),
    "averse" => array(
        "fond" => "10.svg",
        "plus" => "meteo_plus_gris-fonce.png",
        "color" => "#FFFFFF"
    ),
    "neige" => array(
        "fond" => "14.svg",
        "plus" => "meteo_plus_gris-fonce.png",
        "color" => "#FFFFFF"
    ),
    "orage" => array(
        "fond" => "11.svg",
        "plus" => "meteo_plus_noir.png",
        "color" => "#FFFFFF"
    ),
    "brouillard" => array(
        "fond" => "3.svg",
        "plus" => "meteo_plus_blanc.png",
        "color" => "#FFFFFF"
    )
);

$previsionsMeteoInstance = new meteoV2();
$previsionsMeteoData = $previsionsMeteoInstance->recuperation($_SESSION['borne']);
$previsionsMeteo = $previsionsMeteoInstance->getMeteo($previsionsMeteoData);

//on récupère le tableau des prévisions météo et des températures
$meteo = $previsionsMeteo[0];
$tmin = $previsionsMeteo[1];
$tmax = $previsionsMeteo[2];

//prévisions du temps et des températures sur aujourd'hui et les 2 prochains jours
//$meteo = array('soleil', 'couvert', 'nuageux');
//$temperatures = array(25, 19, 17);

?>

<div id="meteo-container">
    
    <img src="img/assets/separateur.svg">
    <div class="meteoItem">
        <p class="meteoTitle">AUJOURD'HUI</p>
        <img src="img/meteo/<?= $tab_meteo[$meteo[0]]['fond'] ?>" alt="meteo"/>
        <div class="meteoTemperatures">
            <p><?= $tmin[0] ?>°C</p>
            <p><?= $tmax[0] ?>°C</p>
        </div>
    </div>

    <img src="img/assets/separateur.svg">
    <div class="meteoItem">
        <p class="meteoTitle">DEMAIN</p>
        <img src="img/meteo/<?= $tab_meteo[$meteo[1]]['fond'] ?>" alt="meteo"/>
        <div class="meteoTemperatures">
            <p><?= $tmin[1] ?>°C</p>
            <p><?= $tmax[1] ?>°C</p>
        </div>
    </div>

    <img src="img/assets/separateur.svg">
    <div class="meteoItem">
        <p class="meteoTitle">APRÈS-DEMAIN</p>
        <img src="img/meteo/<?= $tab_meteo[$meteo[2]]['fond'] ?>" alt="meteo"/>
        <div class="meteoTemperatures">
            <p><?= $tmin[2] ?>°C</p>
            <p><?= $tmax[2] ?>°C</p>
        </div>
    </div>
    <img src="img/assets/separateur.svg">
</div>