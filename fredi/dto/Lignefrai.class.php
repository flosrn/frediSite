<?php
	/**
	 * Object represents table 'lignefrais'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2015-12-04 11:46	 
	 */
	class Lignefrai{
		
		var $idLigne;
		var $date;
		var $trajet;
		var $km;
		var $coutTrajet;
		var $coutPeage;
		var $coutRepas;
		var $coutHebergement;
		var $idDemandeur;
		var $idMotif;
		var $annee;
		var $coutTotal;
		var $nbBordereau;
	
		 function __construct($tableau=array()) {
    $this->hydrater($tableau);
  }

  public function get_date()
		{ return $date; }
		public function set_date( $value)
		{ $date = $value; }
				
		public function getMotif()
		{ return $motif; }
		public function set_motif( $value)
		{ $motif = $value; }
				
		public function getTrajet()
		{ return $trajet; }
		public function set_trajet( $value)
		{ $trajet = $value; }
				
		public function getKm()
		{ return $Km; }
		public function set_km( $value)
		{ $Km = $value; }
				
		public function getCoutTrajet()
		{ return $coutTrajet; }
		public function set_coutTrajet( $value)
		{ $coutTrajet = $value; }
				
		public function getCoutPeage()
		{ return $coutPeage; }
		public function setCoutPeage($value)
		{ $coutPeage = $value; }
				
		public function getCoutHebergement()
		{ return $coutRepas; }
		public function setCoutHebergement( $value)
		{ $coutRepas = $value; }
				
		public function getCoutRepas()
		{ return $dateDeplacement; }
		public function setCoutRepas( $value)
		{ $dateDeplacement = $value; }
				
		public function getCoutTotal()
		{ return $coutTotal; }
		public function setCoutTotal( $value)
		{ $coutTotal = $value; }

		public function getAnnee()
		{ return $annee; }
		public function setAnnee( $value)
		{ $annee = $value; }
		
		public function getNbBordereau()
		{ return $nbBordereau; }
		public function setNbBordereau( $value)
		{ $nbBordereau = $value; }
		
		

    function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_'.$cle;
      if (method_exists($this, $methode))  { 
        $this->$methode($valeur);
      }
    }
  }

   function affiche() {
    echo "<ul>".PHP_EOL;
    foreach ($this as $cle=>$valeur) {
      echo '<li>'.$cle.'='.$valeur."</li>".PHP_EOL;
    }
    echo "</ul>".PHP_EOL;
  }


	}
?>