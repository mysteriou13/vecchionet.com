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

<div style = "color:white">

<div id = "conteneur2">

<div style = "font-size:3em">
liste des services
</div>

</div>


<div id = "conteneur2">

<div>
<p style = "font-size:3em">
framadate
</p>
<p style = "font-size:2em">
Organiser des rendez-vous simplement et librement.
</p>
</div>

</div>

<div id = "conteneur2" >

<p style = "font-size:3em">
framacalc
</p>

<p style = "font-size:2em">
tableur colaboratif
</p>



</div>


<div id = "conteneur2" >

<p style = "font-size:3em">
framaboard

</p>

<p style = "font-size:2em">

gestionaire de projet 

</p>

</div>


<div id = "conteneur2">

<p style = "font-size:3em">
framapad

</p>

<p style = "font-size:2em">
editeur de text colaboratif
</p>

</div>

</div>
</div>

</body>
</html>

