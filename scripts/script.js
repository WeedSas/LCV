// Affichage de l'heure actuelle //
function affichZero(nombre) {
    return nombre < 10 ? '0' + nombre : nombre;
}
function dateEtHeure() {
    const infos = new Date();
    document.getElementById('heure_exacte').innerHTML = ' ' + affichZero(infos.getHours()) + ':' + affichZero(infos.getMinutes());
}
window.onload = function () {
    setInterval("dateEtHeure()", 100);
};


// Animations //
$(function () {

    // clic sur rubrique //
    $(".rubrique").click(function () {
        animateRubrique("[name='"+$(this).attr("name")+"']");
        return idRubrique = "[name='"+$(this).attr("name")+"']";
    });

    // Vrac'Info //
    $("[name='infos']").click(function () {
        $(this).animate({
            top: "428px",
            right: "555px",
            left: "45px",
        }, "slow");
        $(this).children("div.btn-rubrique").animate({
            width: "990px",
            height: "140px",
        });
        $(this).find("h2").animate({
            width: "100%",
        }, "slow");
        $(this).find("img").animate({
            marginTop: "8px",
            marginBottom: "8px",
        });


        $(this).siblings("div.droite").animate({
            left: "1200px",
        });
        $(this).siblings("div.gauche").animate({
            left: "-600px",
        });
    });

    // Bouton Accueil //
    $("#accueil").click(function () {
        retourAccueil(idRubrique);
    });

    function animateRubrique(idRubrique) {
        $(idRubrique).animate({
            top: "428px",
            left: "45px",
        }, "slow");
        $(idRubrique).children("div.btn-rubrique").animate({
            width: "990px",
            height: "140px",
        });
        $(idRubrique).find("h2").animate({
            width: "100%",
        }, "slow");
        $(idRubrique).find("img").animate({
            marginTop: "8px",
            marginBottom: "8px",
        });

        $(idRubrique).find("[name='lvlOne']").animate({
            top: "160px",
        }, "slow").dequeue();
        $(idRubrique).find("[name='lvlTwo']").animate({
            top: "450px",
        }, "slow").dequeue();
        $(idRubrique).find("[name='lvlThree']").animate({
            top: "740px",
        }, "slow").dequeue();
        $(idRubrique).find(".sousRdroite").animate({
            left: "510px",
        }, "slow").dequeue();


        $(idRubrique).siblings("div.droite").animate({
            left: "1200px",
        });
        $(idRubrique).siblings("div.gauche").animate({
            left: "-600px",
        });

        if (idRubrique == "[name='urba']") {
            $("#navigation").animate({
                top: "1460px"
            }, "slow").dequeue();
        } else {
            $("#navigation").animate({
                top: "1168px"
            }, "slow").dequeue();
        }
        $("#accueil").animate({
            left: "0px",
        }, "slow").dequeue();
    };

    function retourAccueil(idRubrique) {
        if (idRubrique == "[name='etatCiv']" || idRubrique == "[name='comCom']" || idRubrique == "[name='infos']" || idRubrique == "[name='consMu']") {
            $(idRubrique).animate({
                left: "555px",
            }).dequeue();
        };
        if (idRubrique == "[name='acteRegMa']" || idRubrique == "[name='etatCiv']") {
            $(idRubrique).animate({
                top: "723px",
                right: "45px",
            });
        } else if (idRubrique == "[name='acteRegPre']" || idRubrique == "[name='comCom']") {
            $(idRubrique).animate({
                top: "1018px",
                right: "45px",
            });
        } else if (idRubrique == "[name='enviro']" || idRubrique == "[name='infos']") {
            $(idRubrique).animate({
                top: "1313px",
                right: "45px",
            });
        };

        $(idRubrique).children("div.btn-rubrique").animate({
            width: "480px",
            height: "275px",
        });
        $(idRubrique).find("h2").css({
            width: "326px",
        });
        $(idRubrique).find("img").animate({
            marginTop: "0px",
            marginBottom: "0px",
        });

        $(idRubrique).find("[name='lvlOne']").animate({
            top: "0px",
        }, "slow").dequeue();
        $(idRubrique).find("[name='lvlTwo']").animate({
            top: "0px",
        }, "slow").dequeue();
        $(idRubrique).find("[name='lvlThree']").animate({
            top: "0px",
        }, "slow").dequeue();
        $(idRubrique).find(".sousRdroite").animate({
            left: "0px",
        }, "slow").dequeue();


        $(idRubrique).siblings("div.droite").animate({
            right: "45px",
            left: "555px",
        });
        $(idRubrique).siblings("div.gauche").animate({
            left: "45px",
        });

        

        $("#accueil").animate({
            left: "-250px",
        });
        $("#navigation").animate({
            top: "1458px"
        });
    };





    

    "use strict";
    sessionStorage.setItem('folderContent', '');

    /**
     * sessionstorage rubrique : si on est dans une sous rubrique (ex urbanisme) : "on"
     *  sinon "off" et on est dans la liste des doc
     */

    sessionStorage.setItem('rubrique', 'off');
    sessionStorage.setItem('pmr', 0);
    //AffichagePMR();

    folderCheck();
    setInterval(folderCheck, 600000);

    // videos nn pris en compte dans la pause du timer d'inactivité
    var excludedVideos = [''];

    sessionStorage.setItem('excludedVideos', excludedVideos);
    /**
     * mise en veille de l'application au bout de 120 secondes d'inactivité
     */
    window.temps = 115000;
    var pauseIdle = false;

    $(document).idle({
        onIdle: function() {
            if (!window.location.href.includes('page0') && pauseIdle == false) {
                alertVeille();
            }
        },
        idle: window.temps

    }, excludedVideos);

    // GESTION IDLE EN FCT DE VIDEO
    //mise en veille ne fonctionne pas lorsqu'on lance une vidéo
    $('body').on('videoStatus', function() {
        if ($(this).hasClass('PLAYING')) { // si le body a sa class à PLAYING
            if (!window.location.href.includes('page0')) { // et que l'on est pas en page0		
                pauseIdle = true // on empeche l'inactivité
            }
        } else {
            pauseIdle = false;
        }
    })

    $(document).mousedown(function() {
        return false;
    });

    // on désactive la possiblité de selectionner du texte sur l'appli
    // $(document).bind('contextmenu', function(e) {
    //     return false;
    // });

    // on désactive la possibilité de faire un clic droit sur l'appli
    //voir pour le chemin du backoffice
    if (window.location.origin.indexOf("bng-networks") >= 0) {
        document.domain = "bng-networks.com";
    } else {
        document.domain = "localhost";
    }

    $(document).on('click', '.page-popup-veille', function() {
        sessionStorage.setItem('annulationVeille', 'true');
        $('.page-popup-veille').css({ 'display': 'none' });
    });

    //click sur la page de veille page 0
    $(".zone_clic_page0").click(function() {
        $("#loadAnimation").css("visibility", "visible");
        window.location.replace('index.php');
    });

    /**
     *Page qui affiche la liste des doc correspondant à la rubrique séléctionnée: cas de sous rubriques *
     *Gestion en ajax qui recharge la page rubrique.php *
     *Rajout d 'un paramètre 1 ou 0 pour savoir si on est sur page des rubrique ou des sous rubriques car la même fonction est utilisée 
     */

    $('.menu_body').on('click', '.bouton_rubrique', function() {
        let rubrique = $(this).attr('data-rub');
        let sous = $(this).attr('data-sous');
        returnListeFiles(rubrique, sous, 1);
    });

    /*********
     *On est sur la liste des documents : click sur un document file ou dossier
     * au click vérification:
     * -Si la variable extension est vide : on est sur un fichier : on affiche le fichier ajax ficheFile
     * -Si la variable extension n'est pas vide on est sur un dossier  : on affiche la liste des fichiers avec la function returnListeFiles
     * extension : on est sur la page de la liste des documents qui contient des dossiers
     * isNameDossier : on est sur la fiche du document qui provient d'un dossier 
     ********/

    $('.menu_body').on('click', '.content_file', function() {
        $("#loadAnimation").css("visibility", "visible");
        let name = $(this).attr('name');
        let urlPdf = $(this).children().attr('name');
        let nameSousRub = $('#sousRub').attr('data-rub');
        const sousRub = $('#sousRub').attr('name');
        const rub = $('#rub').attr('name');
        const numberPage = $('#sousRub').attr('data-numberPage');
        const extension = $(this).attr('data-extension');
        const isNameDossier = $('.menu_body > .fileAffiche').attr('data-dossier');
        //suppression de l'attribut sur le pmr au click du retour à la page des documents : 
        //on n'est plus à l'intérieur d'un dossier
        $('.pmr').attr('data-dossier', '');

        if (extension) {
            if (isNameDossier) {
                //on mets le numéro de la page à 0
                returnListeFiles(rub, nameSousRub, 1, 0);
            } else {
                returnListeFiles(rub, nameSousRub, 1, numberPage, extension);
            }

        } else {
            $.ajax({
                    type: 'post',
                    url: 'fichefile.php',
                    data: {
                        name: name,
                        urlPdf: urlPdf,
                        sousRub: sousRub,
                        rub: rub,
                        nameSousRub: nameSousRub,
                        numberPage: numberPage,
                        isNameDossier: isNameDossier,
                    },
                })
                .then((response) => {
                    $("#loadAnimation").css("visibility", "hidden");
                    //affichage en grand format du document sélectionné
                    $('.fileAffiche').html(response);
                    $('.fileAffiche').css({
                            'background-color': '#363636',
                            'height': '1528px',
                            'position': 'absolute',
                            'width': '1080px',
                            'overflow': 'hidden',
                            'padding-top': '0'

                        });
                    $('.menu_body').css({
                        'margin-left': '0'
                    });
                    $('.fileAffiche').css({
                        'margin-top': '0'
                    });
                    $('.menu_middle').hide();
                    $('.footer').hide();
                        /**
                         * Gestion du retour à la liste des documents
                         * vérification :
                         * -si on a des sous-rubriques (sessionStorage.getItem('rubrique')), envoi de la var dossier qui est vide
                         * -si on a un dossier (dossier) envoi de la const extension
                         */
                    $('#returnListeFiles').on('click', function() {
                        let sous = $(this).attr('data-sous');
                        let dossier = $(this).attr('data-extension');

                        $('.menu_body').css({
                            'margin-left': '55px'
                        });
                        $('.fileAffiche').css({
                            'margin-top': '70px'
                        });
                        $('.menu_middle').show();
                        $('.footer').show();

                        if (dossier) {
                            if (sessionStorage.getItem('rubrique') ==
                                "off") {
                                returnListeFiles(rub, sous, 0, numberPage, extension);
                            } else {
                                returnListeFiles(rub, sous, 1, numberPage, extension);
                            };
                        }
                        if (sessionStorage.getItem('rubrique') ==
                            "off") {
                            returnListeFiles(rub, sous, 0, numberPage, dossier);
                        } else {
                            returnListeFiles(rub, sous, 1, numberPage, dossier);
                        };

                    });

                });
        }

    });

    /********
     * PMR
     * le boutton PMR est le même dans toute l'application
     * vérification où on est
     * -sur la page d'accueil (menu qui bouge)
     * -sur la page des rubriques (documents qui bougent)
     * -sur la page des sous rubriques (menu des sous rubriques qui bouge)
     * 
     ********/


    $(".pmr").click(function() {

        //gestion du PMR sur la page d'accueil
        if (sessionStorage.getItem('pmr') == '1') {
            sessionStorage.setItem('pmr', 0);
        } else {
            sessionStorage.setItem('pmr', 1);
        }

        AffichagePMR();
        //gestion du PMR dans la page de la liste des doc
        let page = $(this).attr('data-page');
        let rubrique = $(this).attr('data-rub');
        let sous = $(this).attr('data-sous');
        let pageSousRub = $(this).attr('data-pageSousRub');
        let dossier = $(this).attr('data-dossier');

        //vérification si on est sur une sous-rubrique ou une rubrique 
        if (page == "RUB") {
            // on est pas dans une sous rubrique
            if (sessionStorage.getItem('rubrique') ==
                "off") {
                returnListeFiles(rubrique, sous, pageSousRub, 0, dossier);
            } else {
                //on est dans une sous rubrique 
                if (pageSousRub == "1") {
                    returnListeFiles(rubrique, sous, 1, 0, dossier);
                } else {

                    returnListeFiles(rubrique, sous, 0, 0, dossier);
                }

            }
        }
    });
})

/************FUNCTIONS***************/

//affiche la partie de la page corespondant au contenu qui se recharge dans la page listeFiles
//function qui est utilisée :
//-au click des rubriques du menu principal
//-au click des sous rubriques
//-au click des rubriques du menu en bas de page
//-au click pour revenir aux sous rubriques

//gére le bouton retour accueil
//gére la pagination

//function(rubrique/sousrubrique/si on est dans une sous rubrique/numéro de page sur laquelle on est/ si on est dans un dossier)
function returnListeFiles(rubrique, sous, pageSousRub, numberPage, extension) {
    $("#loadAnimation").css("visibility", "visible");
    //si pageSousRub est = 0 alors on n'a pas de sous rubrique on est sur la liste des documents
    //si pageSousRub est = 1 alors on est à l'intérieur d'une sous rubrique
    //si sous est = 0 aucune sous rubrique on envoit 0
    //si sous est = 1 construction d'un tableau des sous-rubriques et sessionStorage.setItem('rubrique', 'on');
    if (pageSousRub === 0) {
        if (sous != 0) {
            switch (rubrique) {
                case 'Conseil Municipal':
                    sous = ['AV', 'CR'];
                    break;
                case 'Arrêtés':
                    sous = ['ARM', 'ARP'];
                    break;
                case 'Urbanisme':
                    sous = ['PC', 'DC', 'PLU'];
                    break;

            }
            sessionStorage.setItem('rubrique', 'on');
        }


    }

    if (!sous) {
        sous = 0;

    }


    if (!numberPage) {
        numberPage = 0;
    }


    const ext = extension;
    if (extension) {
        var isNameDossier = $('.menu_body > .fileAffiche').attr('data-dossier');
    } else {
        isNameDossier = "";
    }
    //quand on est dans une rubrique ou sous rubrique on met des attributs sur le boutton pmr
    //pour recharger la partie de la page avec le pmr qui change
    $('.pmr').attr('data-page', 'RUB');
    $('.pmr').attr('data-rub', rubrique);
    $('.pmr').attr('data-sous', [sous]);
    $('.pmr').attr('data-pageSousRub', pageSousRub);
    if (rubrique != "Agenda") {
        $.ajax({
                type: 'get',
                url: 'rubrique.php',
                data: {
                    rubrique: rubrique,
                    sous: sous,
                    pmr: sessionStorage.getItem('pmr'),
                    numberPage: numberPage,
                    pageSousRub: pageSousRub,
                    extension: extension,
                    isNameDossier: isNameDossier
                },
            })
            .then((response) => {
                //affichage en grand format
                $('.menu_body').html(response);
                $("#loadAnimation").css("visibility", "hidden");

                //modidication height menu bas 

                if (sessionStorage.getItem('pmr') === '1') {
                    if (sous == 0) {
                        $('.menu_bas').animate({ 'margin-top': '117' }, 0);
                    }
                    if (Array.isArray(sous)) {
                        $('.menu_bas').animate({ 'margin-top': '35' }, 0);
                    }
                } else {

                    if (sous == 0) {
                        $('.menu_bas').animate({ 'margin-top': '117' }, 0);

                    } else if (Array.isArray(sous)) {
                        $('.menu_bas').animate({ 'margin-top': '117' }, 0);


                    } else {
                        $('.menu_bas').animate({ 'margin-top': '35' }, 0);
                    }
                }


                $('.titre_info').hide();
                $('.bloc_info').hide();

                //on est à l'intérieur d'un dossier
                if (extension != null) {
                    $('.menu_body > .fileAffiche').attr('data-dossier', ext);
                    $('.pmr').attr('data-dossier', ext);
                }

                //retour à la page des rubriques quand on a des sous rubrique
                $('.retour_rubrique').click(function() {
                    let rubrique = $(this).attr('name');
                    let sous = $(this).attr('data-sous');
                    returnListeFiles(rubrique, sous, 0);
                });

                //menu du bas pour retourner sur une rubrique
                $('.bouton_rappel_rubrique').click(function() {
                    let rubrique = $(this).attr('data-rub');
                    let sous = $(this).attr('data-sous');
                    returnListeFiles(rubrique, sous, 0);

                });

                //pagination sur la liste des doc
                $('.pageNext').click(function() {
                    Pagination($(this));
                });

                $('.pagePrevious').click(function() {
                    Pagination($(this));
                });

            });
    } else {
        //à décommenter et enlever l'opacité sur les boutons
        // let url = 'http://intracom.caprovenceverte.fr/grr/day.php';
        // window.location = url;
        $("#loadAnimation").css("visibility", "hidden");
    }


}

function Pagination(element) {
    let rubrique = $(element).attr('data-rub');
    let sous = $(element).attr('data-sous');
    let numberPage = $(element).attr('data-numberPage');
    let dossier = $(element).attr('data-dossier');
    let pageRub = 0;
    if (sous != 0) {
        pageRub = 1;
    }
    returnListeFiles(rubrique, sous, pageRub, numberPage, dossier);
}

// function AffichagePMR() {
//     if (sessionStorage.getItem('pmr') === '1') {
//         $(".menu_top_HOME").animate({ "padding-top": '890' });
//         $(".menu_bottom_HOME").animate({ "margin-top": '-1150' });
//     } else {
//         $(".menu_top_HOME").animate({ "padding-top": '130' });
//         $(".menu_bottom_HOME").animate({ "margin-top": '' });
//     }
// }

function folderCheck() {
    $.ajax({
        url: 'refresh/changeCheck.php',
        success: function(data) {
            if (sessionStorage.getItem('folderContent') == '') {
                sessionStorage.setItem('folderContent', data);
            } else {
                if (sessionStorage.getItem('folderContent') != data) {
                    if (!window.location.href.includes('page0')) {
                        alertVeille('refresh');
                    } else if (!window.location.href.includes('page0') && pauseIdle != false) {

                    } else {
                        $.post('refresh/vbsRun.php');
                    }
                }
            }
        }
    });
}

function alertVeille(refresh = '') {
    $('.compteur-popup-veille').html(5);
    $('.page-popup-veille').css({ 'display': 'flex' });
    var compteur = 5;
    var interval = setInterval(function() {
        if (compteur > 0) {
            $('.compteur-popup-veille').html(compteur - 1);
            compteur--;
        } else if (compteur <= 0 && refresh == 'refresh') {
            $.post('refresh/vbsRun.php');
        } else if (compteur <= 0 && sessionStorage.getItem('annulationVeille') != 'true') {
            $.post('refresh/vbsRun.php');
        } else {
            sessionStorage.setItem('annulationVeille', 'false');
            clearInterval(interval);
        }
    }, 1000);
}