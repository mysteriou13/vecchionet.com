<html>
<body>

<?php 
session_start();

$d = "corsicanet";

include_once("./head.php");

include_once("./header.php");

$des1 = "cliquer pour agrandir";

 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


$nb = mb_substr_count($monUrl, "#");


?>

<div>

<center>




<div id = "site">
&nbsp;
<a href = "./index.php"> haut de la page </a>
</div>

<div>
<strong>
design1
</strong>

</div>

<div id = "site1" style = "border:1px solid black; background-color:white; ">
<div id = "element"  alt="Description"  >

<?php 

include("./site1/index.php");

?>

</div>
</div>

<div id = "site2">
<a href ="./index.php">haut de la page</a>
</div>

<div>
<strong>
desgin2
</strong>
</div>

<div  style = "border:1px solid black; background-color:white; margin:2%;">
<div id = "element"  >

<?php 

include("./site2/index.php");

?>

</div>
</div>
<div id = "site3">
<a href = "./index.php">haut de la page</a>
</div>

</div>

<div id = "" style = "border:1px solid black; background-color:white; margin:2%;">
<div id = "element" alt="Description"  >

<?php 

include("./site3/index.php");

?>

</div>
</div>

<div id = "site4">
<a href = "./index.php">haut de la page </a>
</div>

<div id = "" style = "border:1px solid black; background-color:white; margin:2%;">
<div id = "element"  alt="Description" >

<?php 

include("./site4/index.php");
?>

</div>
</div>

<div id  = "site5">
<a href = "./index.php">haut de la page </a>
</div>

<div id = "" style = "border:1px solid black; background-color:white; margin:2%;">
<div id = "element"  alt="Description"  >
<?php 

include("./site5/index.php");

?>

</div>
</div>

<div id = "site6">
<a href = "./index.php"> haut de page</a>
</div>

<div id = ""  style = "border:1px solid black; background-color:white; margin:2%;">
<div id = "element"  alt="Description">

<?php

include("./site6/index.php");

 ?>

</div>
</div>

</center>

<?php 

include("footer.php");

?>

</body>
</html>

