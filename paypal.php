<?php 
 include_once("head.php");
 include_once("header.php");
 include_once("iframe.php");

 $id =  "SELECT COUNT(*)idtransaction FROM transaction";

 $id1 = $mysqli->query($id);

 $id2 = $id1->fetch_assoc();

if(empty($id2['id'])){

$id2['id'] = 0;

}else{

$id2['id'] = $id2['id']+1;

}

 $idtransanction =  $id2['id'].uniqid().time().sha1($pseudo);

 $nameserver = 'localhost';

 $paypal = "/terraliberta/paypal";

 
if(empty($_SESSION['pseudo'])){

 header('Location:index.php');

}


if($nameserver == "localhost" ){

 $u = "http";

 $link = str_replace("vecchionet.com/", "terraliberta/paypal/",$link);

}else{

$link = str_replace("localhost/vecchionet.com/", "terraliberta.vecchionet.com",$link);

 $u = "https";

}

?>


<div>

<?php 

session_start();

if(empty($_SESSION['pseudo'])){
header("location:../index.php");

}else{

$pseudo = $_SESSION['pseudo'];

}
?>

<script>

function c(a){

  var d1 = 0;
 
  var d2 = 4;



  while(d1 <= d2){

   d1++;
  
  var d3 = "a"+d1; 
 
  var d =  document.getElementById(d3);
  if(d3 == a){

  d.style.display = "block";
  
 }else{

  d.style.display = "none";
 
}

  }
 


}

</script>

<center>
duréer abonnement:</br>


<label>1 mois /5 euro</label>  <input type = "radio"   onclick = "c('a1')" name = "abo"  id = "1">  &nbsp; &nbsp;

<label>3 mois /10 euro</label> <input type = "radio" name = "abo" onclick = "c('a2')"   id = "1">  &nbsp; &nbsp;

<label> 6 mois / 20 euro </label>  <input type = "radio" name = "abo" onclick = "c('a3')" id  = "1" > &nbsp; &nbsp;

<label> 12 mois / 30 euro </label>  <input type = "radio" name = "abo" onclick = "c('a4')" id = "1" > &nbsp; &nbsp;

<?php 
include("boutonpaypal.php");
?>

