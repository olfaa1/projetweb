<?PHP
include "../entities/marque.php";
include "../core/marqueC.php";

if (isset($_POST['Mnom'])  ){
$prod=new marque($_POST['Mnom']);
//Partie2

var_dump($prod);

//Partie3
$marque1C=new MarqueC();
$marque1C->ajouterMarque($prod);
header('Location: marques-data.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>