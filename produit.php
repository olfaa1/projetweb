<?PHP
class Produit{
	private $idp;
	private $libelle;
	private $categorie;
	private $marque;
	private $prix;
	private $dateAj;
	private $couleur;
	private $qte;
	private $imageU;
	function __construct($libelle,$categorie,$marque,$couleur,$prix,$qte,$imageU){
		$this->libelle=$libelle;
		$this->categorie=$categorie;
		$this->marque=$marque;
		
		$this->couleur=$couleur;
		$this->prix=$prix;
		$this->qte=$qte;
		$this->imageU=$imageU;
        $dateAj=date('Y-m-d H:i:s');
	}
	

	function getDateAj(){
		return $this->dateAj;
	}
	
	function getLibelle(){
		return $this->libelle;
	}
	function getCategorie(){
		return $this->categorie;
	}
	function getPrix(){
		return $this->prix;
	}
	function getCouleur(){
		return $this->couleur;
	}
	function getMarque(){
		return $this->marque;
	}

	function getQte(){
		return $this->qte;
	}
    
    function getImageU(){
    	return $this->imageU;
    } 


    // Seeetttttts
      function setLibelle($libelle){
      	return $this->libelle=$libelle;
      }
	
	function setCategorie($categorie){
				$this->categorie=$categorie;
     }
	function setPrix($prix){
		$this->prix=$prix;
	}
	
	function setQte($qte){
		$this->qte=$qte;
	}
	function setCouleur($couleur){
		$this->couleur=$couleur;
	}
	
	function setImageU ($image)
	{
		$thi->imageU=$imageU;
	}

	
}

?>