
<?php

if(file_exists("./site1/style/style.css")){

$style = './site1/style/style.css';

}else{

$style = '../site1/style/style.css';

}

?>

<link rel = "stylesheet" href = "<?php echo $style;?>">

<?php 

 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

 $url = $monUrl;

 $nb = mb_substr_count($monUrl, "site1");

 $nb1 = mb_substr_count($monUrl, "#");

 $nb2 = mb_substr_count($monUrl, "index.php");

 $nb3 = mb_substr_count(getcwd(),"/site1");

 $nb4 = str_replace("site1","",getcwd());

 $nb5 = mb_substr_count($monUrl,"/site1/index.php");
 
 
if($nb == 1){

$des1 = "cliquer pour retourner a l'index";

$url = str_replace('site1/','index.php#site1',$monUrl);;
}else{

$url = $url."/site1/index.php";

}

if($nb2 == 1){

$c = explode('/index.php',$url);

$url = $c[0]."/site1/index.php";

if($nb == 1 ){

$url = $c[0]."/index.php#site1";

}

}

if(isset($_GET['parametre'])){


$url = str_replace("index.php#site1","",$url);

$url = $url."?parametre=".$_GET['parametre']."#site1";


}

$url1 = str_replace("/site1","",$url);

$background = '/../../protonet/coiffure.jpeg';

$accueil =$nb4."/site1/page/accueil.php";

$propos1 = $nb4."/site1/section/propos.php";


?>

<center>

<a href = "<?php echo $url;?>"><?php echo $des1;?> </a>

</center>

<?php

$header = $nb4."/site1/section/header.php";

$footer = $nb4."/site1/section/footer.php";

include_once($header);



if(isset($_GET['parametre']) && !empty($_GET['parametre'])){
if( $_GET['parametre'] == 1 ){

include_once($accueil);

}

if($_GET['parametre'] == 2){

include($propos1);

}

}else{

include_once($accueil);

}


include_once($footer);
?>

