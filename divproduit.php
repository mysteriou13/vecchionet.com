
<?php

$lien = "suiviproduit.php?produit=".$produit2['id']."&nbproduit=".$d;

?>

<div style = ' display:flex;  justify-content: space-between; border: 1px solid ;  margin:1% ;'>

<div style = ' display:flex;  justify-content: space-between;' >
<div>
type de site
</div>

</div>

<div style = ' display:flex;  justify-content:flex-start;' >
<div>
<?php 

echo $produit2['typesite'];

?>
</div>

</div>

<div style = ' display:flex;  justify-content: space-between;' >
<div>
<a style = "color:white;" href = "<?php echo $lien; ?>">

suivre la commande

</a>
</div>

</div>

</div>
