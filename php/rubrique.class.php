<?php 

Class Rubrique {
    private $_id;
    private $_titre;
    private $_image;
    private $_classes;
    private $_sousRubriques = array();

    function __construct($rubrique)
    {
        $this->_id = $rubrique->{'id'};
        $this->_titre = $rubrique->{'titre'};
        $this->_image = $rubrique->{'image'};
        $this->_classes = $rubrique->{'classes'};
        foreach ($rubrique->{'sousRubriques'} as $sousRubrique) {
            $this->_sousRubriques[] = new Rubrique($sousRubrique);
        }
    }

    function getTitre(){
        return $this->_titre;
    }

    function getSousRubriques(){
        return $this->_sousRubriques;
    }

    function getClasses(){
        $classes = implode(' ',$this->_classes);
        return $classes;
    }

    function getImage(){
        return $this->_image->{'icone'};
    }

    function getId(){
        return $this->_id;
    }
}