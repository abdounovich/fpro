<?php  

use App\Taille;

$c=Taille::where('product_id','1')->where('taille','M')->first();
echo $c->id;




?>