<div>
<table>

<tr>
<th>pseudo</th> <td> <?php echo $cloud2['pseudo']; ?></td>
</tr>

<tr>
<th>email</th> <td> <?php echo $cloud2['email']?></td>
</tr>

<tr>

<th> date de fin abonement compte nextcloud</th>
<td> <?php echo $cloud2['date']?></td>

<?php 

$nb = 0;

$thier1 = "SELECT * FROM nextcloud WHERE createur = '$pseudo'";

$thier2 = $mysqli->query($thier1);

while($thier3 = $thier2->fetch_assoc()){

if($thier3['pseudo'] != $thier3['createur']){

$nb++;

}

}


?>
</table>


<table>

<tr>

<td>  nombre de compte dans le groupe : <?php

if($nb >= 1){

 echo $nb;



}else{
echo "pas de compte  dans le groupe";

}

 ?>

</td>

</tr>

</table>

</div>

<?php

if($nb >= 1){

include("divgestcompte.php");

}
 ?>


