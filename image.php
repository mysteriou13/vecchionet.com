
<?php 

header("Content-Type: image/png");
$im = @imagecreate(110, 20)
    or die("Impossible d'initialiser la bibliothèque GD");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
imagepng($im);
imagedestroy($im);


?>

