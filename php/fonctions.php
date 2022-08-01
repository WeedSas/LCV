<?php

// Fonction de traduction de la date
function dateFr() {
    $day = date('l');
    $month = date('F');
    $tabJoursFR = [
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
        'Dimanche'
    ];
    $tabMoisFR = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre'
    ];
    $tabJoursEN = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];
    $tabMoisEN = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    foreach ($tabJoursEN as $key => $jourEN) {
        if ($jourEN === $day) {
            $jourFR = $tabJoursFR[$key];
        }
    }
    foreach ($tabMoisEN as $key => $moisEN) {
        if ($moisEN === $month) {
            $moisFR = $tabMoisFR[$key];
        }
    }
    return $jourFR.date(' d ').$moisFR.date(' Y');
}