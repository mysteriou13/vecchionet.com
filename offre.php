<?php 
session_start();
?>
<html>
<body>

<?php 

include("./hautepage.php");

include_once("./email.php");

?>

<div id = "contact" style = " padding-top:1%;">

<div style = " color:white; ">


<h1 style = "color:white;">

<center id = "connection1"> offre web</center>

</h1>

<h2>
<center>
30 euros/mois
</center>
</h2>

<h3>
<ul>
<p style = "text-align:left;">
<li>
un site adapter pour  pc tablette et telephone.
</li>
</br>
<li>
suivi tout long de la creation du site.
</li>
</br>
<li>
assitance techinique.
</li>
</br>
<li>
r&eacute;f&eacute;rencement de votre site dans les moteurs de recherche
</li>
</br>
<center>

<div onclick = "
<?php

if(isset($_POST['site']) && !empty($_POST['site'])){



}

if(!isset($_SESSION['pseudo'])){

echo "document.getElementById('connection').style.display = 'block'; document.location = '#connection1'";

}else{

echo "document.getElementById('commande').style.display = 'block';  document.location = '#formcommande'";

}

?>
">
commander ici
</div>

</center>

<?php 

if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){

$ins = "none";

}else{

$ins = "block";

}

?>

<div id = "connection" style = "display:<?php echo $ins?>">

<center>
connecter vous pour commander un site
</center>

<?php 
include_once("./formlogin.php");
?>

</div>

<?php 

$display = "none";

$diplayabo = "none";

if(isset($_SESSION['pseudo']) && ! empty($_SESSION['pseudo'])){

$display = "block";



}

if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){
$pseudo = $_SESSION['pseudo'];
                                                                                                
$pseudo =  $connect->real_escape_string($pseudo);                                               
                                                                                                
$verif = "SELECT verifemail  FROM membre WHERE pseudo = '$pseudo'";
                                                                                                
$verif1 = $connect->query($verif);                                                              
                                                                                                
$verif2 = $verif1->fetch_assoc();

if($verif2['verifemail'] == 0){

$displayemail = "none";
$displayemail2 = "block";

}else{
$displayemail2 = "none";


$displayemail = "none";

$displayabo = "none";
$displayemail = "block";

}

}


?>

<div id  = "commande" style = "display:<?php echo $display; ?>; font-size:1em; ">

<form  method = "POST"  >
sss

<center>
fornulaire de precommande

<span style = "display:<?php echo $displayemail;?>">
</br>
type de site
</br>
<input type= "radio" name="site" value="jour"> site vitrine
</br>
<input type= "radio" name="site" value="nuit"> boutique en ligne
</br>
<input type = "radio" name = "site" value = "autre"> autre 
<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
</br>
<input type = "file">
</br>
<textarea style = "height:50%; width:50%;">

</textarea>
</br>
<input type = "submit"  value = "envoyer">
</br>

</span>

<span style = "display:<?php echo $displayemail2?>">
<a href = "./verfiemail.php"style = "color:white;"> pour  commander vous dever valider votre email </a>
</span>

<?php
 
if(isset($_POST['site']) && !empty($_POST['site'])){

$pseudo = $connect->real_escape_string(htmlspecialchars($_SESSION['pseudo']));

$site = $connect->real_escape_string(htmlspecialchars($_POST['site']));

$site = str_replace("jour","vitrine",$site);

$site = str_replace("nuit", "boutique", $site);

$suivi1 = "precommande";

$suivi1 = htmlspecialchars($suivi1);

$suivi = $connect->real_escape_string($suivi1);

$site = "INSERT INTO fichier VALUES('','$pseudo','$site','$suivi')";

$commander = "SELECT * FROM  commande WHERE pseudo ='$pseudo' ORDER BY id DESC";

$commander1 = $connect->query($commander);

$commander2 = $commander1->fetch_assoc();


}

?>

</center>

</form>

</div>

</p>

</ul>
</h3>
</div>

</div>
<?php

include_once("./footer.php");

?>

</body>
</html>

