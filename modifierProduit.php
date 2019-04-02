<HTML>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<?PHP
include "../entities/produit.php";
include "../core/ProduitC.php";
if (isset($_GET['idp'])){
	$produitC=new ProduitC();
    $result=$produitC->recupererProduit($_GET['idp']);
	foreach($result as $row){
		$libelle=$row['libelle'];
		$categorie=$row['categorie'];
		$marque=$row['marque'];
		$couleur=$row['couleur'];
		$prix=$row['prix'];
		$qte=$row['qte'];
		$URLim=$row['URLim'];
?>
<form method="POST">
<table>
	<div class="card">
	<div class="card-header">
                                <strong>Modifier Produit</strong> Formulaire
                            </div>
<caption>Modifier Employe</caption>
</div>
<!--
<tr>
<td>IDp</td>
<td><input type="number" name="idp" value="<?PHP// echo $IDp ?>"></td>
</tr>
-->
<tr>
<td><div class="col col-md-3">Libelle</div></td>
<td><div class="row form-group"><input type="text" name="libelle" value="<?PHP echo $libelle?>" class="form-control"></td></div>
</tr>
<tr>
<td><div class="col col-md-3">Categorie </div></td>
<td><div class="row form-group"><input type="number" name="categorie" value="<?PHP echo $categorie ?>" class="form-control"></td>
	</div>

</tr>
<tr>
<td><div class="col col-md-3">Marque</div></td>
<td><div class="row form-group"><input type="number" name="marque" value="<?PHP echo $marque ?>" class="form-control"></td>
</div>
</tr>
<tr>
<td><div class="col col-md-3">Couleur</div></td>
<td><div class="row form-group"><input type="text" name="couleur" value="<?PHP echo $couleur ?>" class="form-control"></td>
</div>
</tr>
<td><div class="col col-md-3">Prix</div></td>
<td><div class="row form-group"><input type="text" name="prix" value="<?PHP echo $prix ?>" class="form-control"></td>
</div>
</tr>
<td><div class="col col-md-3">Quantite</div></td>
<td><div class="row form-group"><input type="text" name="qte" value="<?PHP echo $qte ?>" class="form-control"></td>
</div>
</tr>
<td><div class="col col-md-3">URL image</div></td>
<td><div class="row form-group"><input type="text" name="URLim" value="<?PHP echo $URLim ?>" class="form-control"></td>
</div>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier" ></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idp_ini" value="<?PHP echo $_GET['idp'];?>" ></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$produit=new produit($_POST['libelle'],$_POST['categorie'],$_POST['marque'],$_POST['couleur'],$_POST['prix'],$_POST['qte'],$_POST['URLim']);
	$produitC->modifierProduit($produit,$_POST['idp_ini']);
	echo $_POST['idp_ini'];
	header('Location: produits-data.php');
}
?>
</body>
</HTMl>