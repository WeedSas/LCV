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

    // Urbanisme //
    $("[name='urba']").click(function () {
        animateRubrique("[name='urba']");
        return idRubrique = "[name='urba']";
    });

    // Conseil municipal //
    $("[name='consMu']").click(function () {
        animateRubrique("[name='consMu']");
        return idRubrique = "[name='consMu']";
    });

    // Actes Mairie //
    $("[name='acteRegMa']").click(function () {
        animateRubrique("[name='acteRegMa']");
        return idRubrique = "[name='acteRegMa']";
    });

    // État Civil //
    $("[name='etatCiv']").click(function () {
        animateRubrique("[name='etatCiv']");
        return idRubrique = "[name='etatCiv']";
    });

    // Actes Préfecture //
    $("[name='acteRegPre']").click(function () {
        animateRubrique("[name='acteRegPre']");
        return idRubrique = "[name='acteRegPre']";
    });

    // ComCom Saint-Tropez //
    $("[name='comCom']").click(function () {
        animateRubrique("[name='comCom']");
        return idRubrique = "[name='comCom']";
    });

    // Environnement //
    $("[name='enviro']").click(function () {
        animateRubrique("[name='enviro']");
        return idRubrique = "[name='enviro']";
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
});