

<table>

<caption id = "b3">
inscription
</caption>

<form action = "<?php $_SERVER['PHP_SELF']?>" method  ="POST">

<tr>

<td id ="td"> pseudo  <input type  ="text"  name = "pseudo"></td>

</tr>

<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

$pseudo = $mysqli->real_escape_string($_POST['pseudo']);

$pseudo1 = "SELECT COUNT(*)pseudo FROM membre WHERE pseudo = '$pseudo'";

$pseudo2 = $mysqli->query($pseudo1);

$pseudo4 = $pseudo2->fetch_assoc();

 if($pseudo4['pseudo'] == 0){
 $validepseudo = 1;
 $errorpseudo = 0;
}else{

$errorpseudo = 1;

echo "pseudo pris";

}



}
   ?>


<tr> <td id = "td"> mot de pass <input type = "password" name  = "pass"> </td> </tr>

<?php
if(isset($_POST['pass']) && !empty($_POST['pass'])){

$pass1 = strlen($_POST['pass']);

if($pass1 >= 8){

$pass =  $_POST['pass'];

$validepass = 1;

}else{

$validepass = 0;

 echo "mot de pass tros court";

}

}

?>

<tr> <td id = "td"> email <input type  = "text" name  = "email"></td> </tr>


<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$email = $mysqli->real_escape_string($_POST['email']);

$email1 = "SELECT COUNT(*)email FROM membre WHERE email ='$email'";

$email2 = $mysqli->query($email1);

$email3 = $email2->fetch_assoc();


if(filter_var($email, FILTER_VALIDATE_EMAIL)){

$errorformatemail = 1;

}else{

  $errorformatemail = 0;

}

if($email3['email'] == 0){

$valideemail  = 1;

$erroremail  = 0;

}else{
   $erroremail = 1;

}

}


 ?>
<tr>
<td id ="td">
 accepter  les <a  href = "<?php echo $link."/CGU.php"?>"> CGU </a> <input  name = "CGU"  type = "checkbox">

<?php 

if(isset($_POST['val'])  && $_POST['CGU'] !== "on" ){

echo "vous devez accepter les CGU";

}

?>
</td>
</tr>

<tr>
<td id= "td">
 <button class="b" type = "submit" name = "val" value = "valider">valider</button>
</td>
</tr>

</form>

<?php 

$errorpseudo = null;
$erropass = null;
$errorformatemail  = null;
$erroremail = null;

$total = null;


$total = $validepseudo+$validepass+$valideemail;


if($total == 3 && isset($_POST['CGU']) && $_POST['CGU'] == "on"){

$pass = password_hash($pass,PASSWORD_DEFAULT);

$pass = $mysqli->real_escape_string($pass);

$date = date("d").date("m").date("y");

$date = $mysqli->real_escape_string($date);

$length =  rand(10, 50);

$token = bin2hex(random_bytes($length));

$tokenmail = $mysqli->real_escape_string($token);

$verifemail = 0;

$verifemail = $mysqli->real_escape_string($verifemail);


$i = 'INSERT INTO membre VALUES(NULL,"'.$pseudo.'","'.$pass.'","'.$email.'","'.$date.'", "'.$verifemail.'","'.$tokenmail.'")';

 $moth = date("m")+1; 

 $date = date("d").$moth.date("y");

 $date = $mysqli->real_escape_string($date);

$return = "https://www.vecchionet.com";

$message = "pour confirmé votre inscription  copier  dans votre navigateur web : :".$link;

$e->envoiemail($email,"confirmation inscription",$message,"massanthony@vecchionet.com");

}
?>

</table>
