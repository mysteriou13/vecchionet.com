<html>
<body>
<?php
include("./header.php"); 
include("./head.php");
include("./sqlbackend/sqlbackend.php");
include("./quota.php");

$back = new sqlbackend();

$date = date("d-m-Y");

$tab = $_POST['custom'];

$tab = explode("_",$tab);

$admin = $tab[1];

$display = $tab[2];

$groupename = $tab[3];
$username = $tab[4];
$email = $tab[5];
$quota = $tab[6];
$home = $tab[7];
$password = $tab[8];

 if($password == "courant"){

$sql = 'SELECT * FROM membre WHERE pseudo = "'.$pseudo.'"';

$sql1 = $mysqli->query($sql);

$sql2 = $sql1->fetch_assoc();

$password = $sql2['pass'];

}else{

$password = password_hash($password, PASSWORD_DEFAULT);

}
 
$displayname = $tab[9];
$active = $tab[10];
$disabled = $tab[11];
$avatar = $tab[12];
$salt = $tab[13];

 $createur = $tab[14];

$type = $tab[15]; 
$rad = $tab[16];


if($type == "perso"){

$back = new sqlbackend();

if($rad == "abo"){
$date = 'SELECT * FROM nextcloud WHERE pseudo = "'.$pseudo.'"';

$date1 = $mysqli->query($date);

$date2 = $date1->fetch_assoc();

$quota = "+".$quota." month";

$quota = $mysqli->real_escape_string($quota);

$date = new DateTime($date2['date']);


$date->modify($quota);
 
$quota = $date->format('d-m-Y');

$quota  = $mysqli->real_escape_string($quota);

$selectnext = 'SELECT * FROM nextcloud WHERE pseudo = "'.$pseudo.'"';

$selectnext1 = $mysqli->query($selectnext);

$selectnext2 = $selectnext1->fetch_assoc();

$next = 'UPDATE nextcloud SET date = "'.$quota.'" WHERE pseudo = "'.$pseudo.'"';

$back->grouptable($nextcloud,$admin,$displayname,$groupename);

$back->User_group_table($nextcloud,$username,$groupename);

$back->User_table($nextcloud,$username,$email,$quota,$home,$password,$displayname,$active,$disabled,$avatar,$salt);

if($selectnext2['pseudo'] == null){

$back->nextcloud($nextcloud,$pseudo,$email,$quota,$createur);

}else{

$mysqli->query($next);

}

}


}


if($rad == "sto"){

$nbquota= $quota."GB";

$nbquota = $nextcloud->real_escape_string($nbquota);

 $selectgb = "SELECT COUNT(*)userid FROM oc_preferences  WHERE userid = '$pseudo' && configkey = 'quota' ";

$selectgb1 = $nextcloud->query($selectgb);

$selectgb2 = $selectgb1->fetch_assoc();

$configkey = "quota";

$configkey = $nextcloud->real_escape_string($configkey);

$appid = "files";

$appid = $nextcloud->real_escape_string($appid);

$insertgb =  'INSERT INTO  oc_preferences VALUES( "'.$pseudo.'","'.$appid.'", "'.$configkey.'", "'.$nbquota.'")';

if($selectgb2['userid'] == 0){

$nextcloud->query($insertgb);

}else{

$sel = 'SELECT configvalue FROM oc_preferences  WHERE userid = "'.$pseudo.'" && appid = "files" ';

$sel1 = $nextcloud->query($sel);

$sel2 = $sel1->fetch_assoc();

$nbsel = $sel2['configvalue'];

$str = str_replace("GB","",$nbsel);

$quota = $str+$quota;

quota($quota,$pseudo,$nextcloud);

}

}

if($type == "thier"){

 $group = "thier";

$group = $mysqli->real_escape_string($group);

$quota = $mysqli->real_escape_string($quota);

$nb = 'SELECT * FROM nbgroupe WHERE pseudo = "'.$pseudo.'"';

$nb1 = $mysqli->query($nb);

$nb2 = $nb1->fetch_assoc();

if($nb2['nb'] != null){

$upnb = $nb2['nb']+$quota;

$upnb = $mysqli->real_escape_string($upnb);

$up = 'UPDATE nbgroupe SET nb  = "'.$upnb.'" WHERE pseudo =  "'.$pseudo.'"';

$mysqli->query($up);


}else{

$up =  'INSERT INTO nbgroupe VALUES (NULL,"'.$pseudo.'","'.$group.'","'.$quota.'")';

$mysqli->query($up);

$gid = $group.$_SESSION['pseudo'];

$gid =  $nextcloud->real_escape_string($gid);

$uid =  $_SESSION['pseudo'];


$uid = $nextcloud->real_escape_string($uid);
 $oc_groups =  'INSERT INTO oc_groups VALUES("'.$gid.'", "'.$uid.'")';

$nextcloud->query($oc_groups);


$oc_group_admin = 'INSERT INTO oc_group_admin VALUES("'.$gid.'", "'.$uid.'")';

$nextcloud->query($oc_group_admin);

$oc_group_user = 'INSERT INTO oc_group_user VALUES("'.$gid.'", "'.$uid.'")';

$nextcloud->query($oc_group_user);

}


}


?>

</body>
</html>
