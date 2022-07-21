<?php

class meteoV2
{

    private $cheminDossierCustom;

    public function __construct($leCheminDossierCustom = NULL)
    {
        $this->cheminDossierCustom = $leCheminDossierCustom;
    }

    private $listeImagesCustom = array(

        "0" => "1.png", // Soleil
        "1" => "5.png", // Peu nuageux
        "2" => "5.png", // Ciel voilé
        "3" => "4.png", // Nuageux
        "4" => "4.png", // Très nuageux
        "5" => "5.png", // Couvert
        "6" => "3.png", // Brouillard
        "7" => "3.png", // Brouillard givrant

        "10" => "7.png", // Pluie faible
        "11" => "7.png", // Pluie modérée
        "12" => "10.png", // Pluie forte
        "13" => "7.png", // Pluie faible verglaçante
        "14" => "7.png", // Pluie modérée verglaçante
        "15" => "10.png", // Pluie forte verglaçante
        "16" => "3.png", // Bruine

        "20" => "14.png", // Neige faible
        "21" => "14.png", // Neige modérée
        "22" => "14.png", // Neige forte

        "30" => "14.png", // Pluie et neige mêlées faibles
        "31" => "14.png", // Pluie et neige mêlées modérées
        "32" => "14.png", // Pluie et neige mêlées fortes

        "40" => "7.png", // Averses de pluie locales et faibles
        "41" => "7.png", // Averses de pluie locales
        "42" => "10.png", // Averses locales et fortes
        "43" => "7.png", // Averses de pluie faibles
        "44" => "7.png", // Averses de pluie
        "45" => "10.png", // Averses de pluie fortes
        "46" => "7.png", // Averses de pluie faibles et fréquentes
        "47" => "7.png", // Averses de pluie fréquentes
        "48" => "10.png", // Averses de pluie fortes et fréquentes

        "60" => "14.png", // Averses de neige localisées et faibles
        "61" => "14.png", // Averses de neige localisées
        "62" => "14.png", // Averses de neige localisées et fortes
        "63" => "14.png", // Averses de neige faibles
        "64" => "14.png", // Averses de neige
        "65" => "14.png", // Averses de neige fortes
        "66" => "14.png", // Averses de neige faibles et fréquentes
        "67" => "14.png", // Averses de neige fréquentes
        "68" => "14.png", // Averses de neige fortes et fréquentes

        "70" => "14.png", // Averses de pluie et neige mêlées localisées et faibles
        "71" => "14.png", // Averses de pluie et neige mêlées localisées
        "72" => "14.png", // Averses de pluie et neige mêlées localisées et fortes
        "73" => "14.png", // Averses de pluie et neige mêlées faibles
        "74" => "14.png", // Averses de pluie et neige mêlées
        "75" => "14.png", // Averses de pluie et neige mêlées fortes
        "76" => "14.png", // Averses de pluie et neige mêlées faibles et nombreuses
        "77" => "14.png", // Averses de pluie et neige mêlées fréquentes
        "78" => "14.png", // Averses de pluie et neige mêlées fortes et fréquentes

        "100" => "11.png", // Orages faibles et locaux
        "101" => "11.png", // Orages locaux
        "102" => "11.png", // Orages fort et locaux
        "103" => "11.png", // Orages faibles
        "104" => "11.png", // Orages
        "105" => "11.png", // Orages forts
        "106" => "11.png", // Orages faibles et fréquents
        "107" => "11.png", // Orages fréquents
        "108" => "11.png", // Orages forts et fréquents

        "120" => "11.png", // Orages faibles et locaux de neige ou grésil
        "121" => "11.png", // Orages locaux de neige ou grésil
        "122" => "11.png", // Orages locaux de neige ou grésil
        "123" => "11.png", // Orages faibles de neige ou grésil
        "124" => "11.png", // Orages de neige ou grésil
        "125" => "11.png", // Orages de neige ou grésil
        "126" => "11.png", // Orages faibles et fréquents de neige ou grésil
        "127" => "11.png", // Orages fréquents de neige ou grésil
        "128" => "11.png", // Orages fréquents de neige ou grésil

        "130" => "11.png", // Orages faibles et locaux de pluie et neige mêlées ou grésil
        "131" => "11.png", // Orages locaux de pluie et neige mêlées ou grésil
        "132" => "11.png", // Orages fort et locaux de pluie et neige mêlées ou grésil
        "133" => "11.png", // Orages faibles de pluie et neige mêlées ou grésil
        "134" => "11.png", // Orages de pluie et neige mêlées ou grésil
        "135" => "11.png", // Orages forts de pluie et neige mêlées ou grésil
        "136" => "11.png", // Orages faibles et fréquents de pluie et neige mêlées ou grésil
        "137" => "11.png", // Orages fréquents de pluie et neige mêlées ou grésil
        "138" => "11.png", // Orages forts et fréquents de pluie et neige mêlées ou grésil

        "140" => "11.png", // Pluies orageuses
        "141" => "11.png", // Pluie et neige mêlées à caractère orageux
        "142" => "11.png", // Neige à caractère orageux

        "210" => "7.png", // Pluie faible intermittente
        "211" => "7.png", // Pluie modérée intermittente
        "212" => "10.png", // Pluie forte intermittente

        "220" => "14.png", // Neige faible intermittente
        "221" => "14.png", // Neige modérée intermittente
        "222" => "14.png", // Neige forte intermittente

        "230" => "14.png", // Pluie et neige mêlées
        "231" => "14.png", // Pluie et neige mêlées
        "232" => "14.png", // Pluie et neige mêlées
        "235" => "14.png" // Averses de grêle
    );

    public function recuperation($name)
    {
        //On récupère le json en fonction du nom passé dans la méthode
        $json = json_decode(file_get_contents(__DIR__ . "/../../meteo/previsions/" . $name . ".json"));
        $results[$name] = $json;
        return $results;
    }

    //fonction pour afficher la meteo
    public function affichage_meteo($results, $custom = false, $langue)
    {
        $traductions = new Traductions();
        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        echo '<div class="affichage_meteo">';
        echo '<div class="meteo_jour j0">';
        echo '<div class="titre_jour">' . $traductions->Translate('AUJOURD\'HUI', $langue) . '</div>';
        echo '<div class="img_jour j0">';
        if (!$custom) {
            echo '<img src="' . $value->$jour->{'icon'} . '" width="55px">'; //incone
        } else {
            try {
                if ($this->cheminDossierCustom == NULL) {
                    throw new Exception('Chemin du dossier des icônes personnalisées manquant !');
                } else {

                    echo '<img src="' . $this->cheminDossierCustom . $this->listeImagesCustom[$results[key($results)]->forecast[0]->weather] . '">'; //incone
                }

            } catch (Exception $e) {
                echo 'Exception reçue : ', $e->getMessage(), "\n";
            }
        }
        echo '</div>';
        echo '<div class="tmp_jour_0">' . $results[key($results)]->forecast[0]->tmax . ' °C</div>';
        echo '</div>';
        foreach ($results as $key => $value) {
            for ($i = 0; $i < 3; $i++) {
                echo '<img class="img_separate" src="Style_1/Ligne 1.png"/>';
                echo '<div class="meteo_jour j' . $i . '">';
                $jour = $i; //Permet de boucler sur le json
                //AFFICHAGE DES JOURS
                $date = new dateTime(date('Y-m-d')); //création d'un objet date time
                $date->modify('+' . $i . 'days');
                $date = date_timestamp_get($date); //on récupère le timestamp
                if ($i == 1) {
                    echo '<div class="titre_jour">' . $traductions->Translate('DEMAIN', $langue) . '</div>';
                } elseif ($i == 2) {
                    echo '<div class="titre_jour">' . $traductions->Translate('APRES-DEMAIN', $langue) . '</div>';
                }
                echo '<div class="img_jour">';
                if (!$custom) {
                    echo '<img src="' . $value->$jour->{'icon'} . '">'; //incone
                } else {
                    try {

                        if ($this->cheminDossierCustom == NULL) {
                            throw new Exception('Chemin du dossier des icônes personnalisées manquant !');
                        } else {

                            echo '<img src="' . $this->cheminDossierCustom . $this->listeImagesCustom[$value->forecast[$jour]->weather] . '">'; //incone
                        }

                    } catch (Exception $e) {
                        echo 'Exception reçue : ', $e->getMessage(), "\n";
                    }
                }
                echo '</div>';
                echo '<div class="tmp_min">' . $value->forecast[$jour]->tmin . '°C</div>';
                echo '<div class="tmp_max">' . $value->forecast[$jour]->tmax . '°C</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }

    public function getMeteo($results)
    {
        //==================================================================//
        //	Retourne un tableau de résultats météo sous la forme:		   //
        //																  //
        //	array(														 //
        //		array(temps_J0, temps_J1, temps_J2),					//
        //      array(tmin_J0, tmin_J1, tmin_J2) 					   //
        //		array(tmax_J0, tmax_J1, tmax_J2)                      //
        //	)														 //
        //==========================================================//

        $resultatsMeteo = array();

        foreach ($results as $value) {
            for ($i = 0; $i < 3; $i++) {
                $weather = $value->forecast[$i]->weather;
                $tmin = $value->forecast[$i]->tmin;
                $tmax = $value->forecast[$i]->tmax;

                if ($weather == "0") {
                    $weather = 'soleil';
                } elseif (in_array($weather, array("6", "7", "16"))) {
                    $weather = 'brouillard';
                } elseif (in_array($weather, array("3", "4"))) {
                    $weather = 'nuageux';
                } elseif (in_array($weather, array("1", "2", "5"))) {
                    $weather = 'couvert';
                } elseif (in_array($weather, array("10", "11", "13", "14", "40", "41", "43", "44", "46", "47"))) {
                    $weather = 'pluie';
                } elseif (in_array($weather, array("12", "15", "42", "45", "48", "210", "211", "212"))) {
                    $weather = 'averse';
                } elseif (in_array($weather, array("100", "101", "102", "103", "104", "105", "106", "107", "108", "120", "121", "122", "123", "124", "125", "126", "127", "128", "130", "131", "132", "133", "134", "135", "136", "137", "138", "140", "141", "142"))) {
                    $weather = 'orage';
                } elseif (in_array($weather, array("20", "21", "22", "30", "31", "32", "60", "61", "62", "63", "64", "65", "66", "67", "68", "70", "71", "72", "73", "74", "75", "76", "77", "78", "220", "221", "222", "230", "231", "232", "235"))) {
                    $weather = 'neige';
                }
                $resultatsMeteo[0][] = $weather;
                $resultatsMeteo[1][] = $tmin;
                $resultatsMeteo[2][] = $tmax;
            }
        }
        return $resultatsMeteo;
    }
}