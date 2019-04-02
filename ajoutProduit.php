<?PHP
include "../entities/produit.php";
include "../core/produitC.php";

if (isset($_POST['libelle']) and isset($_POST['categorie']) and isset($_POST['marque']) and isset($_POST['couleur']) and isset($_POST['prix'])  and isset($_POST['qte']) and isset($_POST['URLim']) ){
    
	
  $prod=new produit($_POST['libelle'],$_POST['categorie'],$_POST['marque'],$_POST['couleur'],$_POST['prix'],$_POST['qte'],$_POST['URLim'],$_POST['dateAj']);
//Partie2

var_dump($prod);

//Partie3
$produit1C=new ProduitC();
$produit1C->ajouterProduit($prod);
header('Location: produits-data.php');
	
  
   
  


}else{
	echo "vérifier les champs";
}
//*/

?>