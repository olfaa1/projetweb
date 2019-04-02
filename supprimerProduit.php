<?PHP
include "../core/produitC.php";
$produitC=new ProduitC();
if (isset($_POST["idp"])){
	$produitC->supprimerProduit($_POST["idp"]);
	header('Location: produits-data.php');
}

?>