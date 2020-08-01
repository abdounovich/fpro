<?php  

use App\Commande;

$c=new Commande();
      $c->product_id="1";
      $c->telephone="0657713824";
      $c->type='1';
      $c->taille="S";
      $c->facebook= "facebook";
      $c->save();
      echo $c->id;


?>