
<?php

$file = "./des.php";

$site= "site5";

if(file_exists($file)){
include_once("./des.php");

}

if(file_exists("../des.php")){

include_once("../des.php");

}

$monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

 $url = $monUrl;

$nb = mb_substr_count($monUrl, "site5");

if($nb == 1){

$des1 = "cliquer pour retourner a l'index";

$url = str_replace('site5/','#site5',$monUrl);;
}else{

$url = $url."site5/";

}
?>

<center>
<a href = "<?php echo $url?>"><?php echo $des1?> </a>
</center>

<link rel = "stylesheet" href = "http://localhost/protonet/site5/style/style.css">

<div id = "site5a1"  alt = "Description"  >

<center>


</center>

<div id = "site5a2">


</div>

<div id = "site5a6">

</div>
</div>

