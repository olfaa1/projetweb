<?PHP
include "../core/marqueC.php";
$marqueC=new MarqueC();
if (isset($_POST["idm"])){
	$marqueC->supprimerMarque($_POST["idm"]);
	header('Location: marques-data.php');
}

?>