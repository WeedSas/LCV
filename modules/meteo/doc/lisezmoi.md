# Documentation MeteoCustom

## Besoin

Le but de cette ajout de fonctionnalité est de pouvoir remplacer les icônes d'origine fourni par prevision-meteo.ch par des icônes personnalisées pour chaque projet.

Le principe est le suivant: il faut mettre dans un dossier spécifique les fichiers images correspondant aux images désirés. Un petit algorithme se chargera de remplacer le fichier en fonction des prévisions météorologiques.

## Convention de nommage

Afin que tout fonctionne, il faut respecter la convention de nommage suivante:

----------------------------------------------------------
	Nom								Fichier
------------------   -----------------------
    Ensoleillé						ensoleille.png
	Nuit claire						nuit_claire.png
	Ciel voilé						ciel_voile.png
	Nuit légèrement voilée			nuit_leger_voilee.png
	Faibles passages nuageux		faibles_passages_nuages.png
	Nuit bien dégagée				nuit_degagee.png
	Brouillard						brouillard.png
	Stratus							stratus.png
	Stratus se dissipant			stratus_dissp.png
	Nuit claire et stratus			nuit_claire_stratus.png
	Eclaircies						eclaircies.png
	Nuit nuageuse					nuit_nuage.png
	Faiblement nuageux				nuages_faibles.png
	Fortement nuageux				nuages_forts.png
	Averses de pluie faible			averses_faible.png
	Nuit avec averses				nuit_averses.png
	Averses de pluie modérée		averses_moderee.png
	Averses de pluie forte			averses_forte.png
	Couvert avec averses			couvert_averses.png
	Pluie faible					pluie_faible.png
	Pluie forte						pluie_forte.png
	Pluie modérée					pluie_moderee.png
	Développement nuageux			dev_nuages.png
	Nuit avec développement			nuit_dev_nuages.png
	nuageux	
	
	Faiblement orageux				orage_faible_.png
	Nuit faiblement orageuse		nuit_orage_faible.png
	Orage modéré					orage_modere.png
	Fortement orageux				orage_fort.png
	Averses de neige faible			neige_averses_faible.png
	Nuit avec averses de			nuit_neige_averses_faible.png
	neige faible
	
	Neige faible					neige_faible.png
	Neige modérée					neige_moderee.png
	Neige forte						neige_forte.png
	
	Pluie et neige mêlée faible			neige_pluie_faible.png	
	Pluie et neige mêlée modérée		neige_pluie_moderee.png	
	Pluie et neige mêlée forte			neige_pluie_forte.png

----------------------------------------------------------  

## Code

Pour utiliser la classe avec les icônes personnalisé, il faut passer en paramètre du constructeur le chemin du dossier contenant les fichiers:
````
$meteo = new meteo("img/");
````

Puis, ajouter le 2ème paramètre "true" pour cette fonction:
```
$results = $meteo->recuperation($name);

$meteo->affichage_meteo($results); // Affiche les icônes fournie par le site
$meteo->affichage_meteo($results,true); // Affiche les icônes personnalisé (une exception sera déclenché en cas d'oubli du chemin du dossier)
````
