<?php 
class fonctions{	
	/**
	 * @param  mixed $rubrique
	 * @return array
	 */
	public function titre_rub($rubrique){
		$liste_titre_rub = array(
		"CM"=>"Conseil Municipal",
		"CC"=>"Conseil Communautaire",
		"AR"=>"Arrêtés",
		"URBA"=>"Urbanisme",
		"MA"=>"Mariages"
		);
		return $liste_titre_rub[$rubrique];
	}	
	/**
	 *
	 * @param  mixed $sous_rubrique
	 * @return array
	 */
	public function sous_titre_rub($sous_rubrique){
		$liste_sous_titre_rub = array(
		"AV"=>"Avis",
		"CR"=>"Comptes rendus",
		"ARM"=>"Arrêtés municipaux",
		"ARP"=>"Arrêtés préfectauraux",
		"PC"=>"Permis de construire",
		"DC"=>"Délibérations",
		"PLU"=>"Plan Local Urbanisme"
        );
	
		return $liste_sous_titre_rub[$sous_rubrique];
	}

    /**
     * méthode pour supprimer les accents des données
     *
     * @param  mixed $data
     * @return string
     */
    public function deleteAccent($data)
    {
        $pattern_accent = ["é", "è", "ê", "ë", "ç", "à", "â", "ä", "î", "ï", "ù", "ô", "ó", "ö"];
        $pattern_replace_accent = ["e", "e", "e", "e", "c", "a", "a", "a", "i", "i", "u", "o", "o", "o"];
        return str_replace($pattern_accent, $pattern_replace_accent, $data);
    }

}
?>