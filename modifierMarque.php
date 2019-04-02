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
include "../entities/marque.php";
include "../core/MarqueC.php";
if (isset($_GET['idm'])){
	$marqueC=new MarqueC();
    $result=$marqueC->recupererMarque($_GET['idm']);
	foreach($result as $row){
		$mnom=$row['Mnom'];
		
?>
<form method="POST">
<table>
	<div class="card">
	<div class="card-header">
                                <strong>Modifier marque</strong> Formulaire
                            </div>
<caption>Modifier marque</caption>
</div>
<!--
<tr>
<td>IDp</td>
<td><input type="number" name="idp" value="<?PHP// echo $IDp ?>"></td>
</tr>
-->
<tr>
<td><div class="col col-md-3">nom marque</div></td>
<td><div class="row form-group"><input type="text" name="mnom" value="<?PHP echo $mnom?>" class="form-control"></td></div>
</tr>

<td></td>
<td><input type="submit" name="modifier" value="modifier" ></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idm_ini" value="<?PHP echo $_GET['idm'];?>" ></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$marque=new marque($_POST['mnom']);
	$marqueC->modifierMarque($marque,$_POST['idm_ini']);
	echo $_POST['idm_ini'];
	header('Location: marques-data.php');
}
?>
</body>
</HTMl>