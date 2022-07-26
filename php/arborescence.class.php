<?php

Class Arborescence {
    private $_tabRubriques;

    function __construct($arborescence)
    {
        foreach ($arborescence as $rubriques) {
            $this->_tabRubriques[] = new Rubrique($rubriques);
        }
    }

    public function getTitres(){
        foreach ($this->_tabRubriques as $rubriques) {
            $titres[] = $rubriques->getTitre();
        }
        return $titres;

    }

    public function getTabRubriques(){
        return $this->_tabRubriques;
    }
}