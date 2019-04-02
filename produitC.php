<?PHP
include "../config.php";
include "../entities/marque.php";
class ProduitC {
function afficherProduit ($produit){
	     
	    echo "id: ".$produit->getId()."<br>";
		echo "Libelle: ".$produit->getLibelle()."<br>";
		echo "Categorie: ".$produit->getCategorie()."<br>";
		echo "Marque: ".$produit->getMarque()."<br>";
		echo "couleur: ".$produit->getCouleur()."<br>";
		echo "prix: ".$produit->getPrix()."<br>";
		echo "Quantite: ".$produit->getQte()."<br>";
		echo "DateAjout: ".$produit->getDateAj()."<br>";
		
	}
	/*
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	*/
	function ajouterProduit($produit){
		$sql="insert into produit (libelle,categorie,marque,qte,couleur,prix,URLim,dateAj) values (:libelle, :categorie,:marque,:qte,:couleur,:prix ,:imageU,CURDATE())";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $libelle=$produit->getLibelle();
        $categorie=$produit->getCategorie();
        $marque=$produit->getMarque();
        $qte=$produit->getQte();
        $couleur=$produit->getCouleur();
        $prix=$produit->getPrix();
        $imageU=$produit->getImageU();
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':marque',$marque);
		$req->bindValue(':qte',$qte);
		$req->bindValue(':couleur',$couleur);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':imageU',$imageU);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProduits(){
		$sql="SElECT libelle,IDp,prix,categorie,URLim,couleur, qte,dateAj,IDm,marque,Mnom,nom From produit e inner join marque a on e.marque= a.IDm inner join categorie c on e.categorie= c.IDc";
		//$sql="SElECT * From produit p inner join
    //categorie c
       // on p.categorie = c.IDc
        //inner join 
   // marque m
       // on p.marque = m.IDm ";
   //$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerProduit($idp){
		$sql="DELETE FROM produit where IDp= :idp";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idp',$idp);
		try{
            $req->execute();
          // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierProduit($produit,$idp){
		$sql="UPDATE produit SET IDp=:idp, libelle=:libelle, categorie=:categorie,marque=:marque,qte=:qte,couleur=:couleur ,
		prix=:prix ,URLim=:URLim WHERE IDp=:idp";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		 $libelle=$produit->getLibelle();
        $categorie=$produit->getCategorie();
        $marque=$produit->getMarque();
        $qte=$produit->getQte();
        $couleur=$produit->getCouleur();
        $prix=$produit->getPrix();
        $imageU=$produit->getImageU();

		$datas = array(':IDp'=>$idp,':libelle'=>$libelle, ':categorie'=>$categorie,':marque'=>$marque,':qte'=>$qte,':couleur'=>$couleur,':prix'=>$prix,':imageU'=>$imageU);
		//$req->bindValue(':libelle1',$libelle1);
		$req->bindValue(':idp',$idp);
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':marque',$marque);
		$req->bindValue(':qte',$qte);
		$req->bindValue(':couleur',$couleur);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':URLim',$imageU);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}

	function recupererProduit($idp){
		$sql="SELECT * from produit where IDp=$idp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	/*
	function rechercherListeEmployes($tarif){
		$sql="SELECT * from employee where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	*/
}

?>