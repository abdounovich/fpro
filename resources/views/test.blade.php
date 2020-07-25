<?php  

use App\Product;

$c=Product::where('id','10')->get(['taille'])->first();
echo  (string) $c;




?>