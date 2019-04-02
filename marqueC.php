<?PHP
include "../config.php";
class MarqueC {
function afficherMarque ($produit){
	     
	    echo "mnom: ".$produit->getMnom()."<br>";
		
	}
	/*
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	*/
	function ajouterMarque($marque){
		$sql="insert into marque (Mnom) values (:mnom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $mnom=$marque->getMnom();
      
		$req->bindValue(':mnom',$mnom);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherMarques(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From marque";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerMarque($idm){
		$sql="DELETE FROM marque where IDm = :idm";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idm',$idm);
		try{
            $req->execute();
          // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierMarque($produit,$idm){
		$sql="UPDATE marque SET IDm=:idm, mnom=:mnom WHERE IDm=:idm";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		 $mnom=$produit->getMnom();
        
		$datas = array(':IDm'=>$idm,':mnom'=>$mnom);
		//$req->bindValue(':libelle1',$libelle1);
		$req->bindValue(':idm',$idm);
		$req->bindValue(':mnom',$mnom);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}

	function recupererMarque($idm){
		$sql="SELECT * from marque where IDm=$idm";
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