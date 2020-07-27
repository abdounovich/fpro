<?php
use App\Taille;
use App\Product;
use App\Commande;
use App\Conversations\ExampleConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\Drivers\Facebook\Extensions\Button;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ReceiptAddress;
use BotMan\Drivers\Facebook\Extensions\ReceiptElement;
use BotMan\Drivers\Facebook\Extensions\ReceiptSummary;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\ReceiptTemplate;
use BotMan\Drivers\Facebook\Extensions\ReceiptAdjustment;
use BotMan\Drivers\Facebook\Extensions\MediaAttachmentElement;




   
   
 
$botman = resolve('botman');

$botman->hears('GET_STARTED', function ($bot) {
    $bot->typesAndWaits(1);
    $attachment = new Image('http://smartbots.global/images/resources/smart-bot.gif', [
        'custom_payload' => true,
    ]);
    
    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message); 
    $user = $bot->getUser();
// Access first name
$firstname = $user->getFirstName();
$lastname = $user->getLastName();

$bot->reply($firstname . "-".$lastname. ' : مرحبا بك 🙋‍♂ ');
$bot->reply( '☺ تشرفنا زيارتك لصفحة AJMODA  ');
$bot->reply(ButtonTemplate::create('كيف يمكننا خدمتك')
	->addButton(ElementButton::create(' 🛍 منتجاتنا ')
	    ->type('postback')
	    ->payload('show_products')
	)
	->addButton(ElementButton::create('⁉ استفسار ')
	    ->url('http://botman.io/')
	)
);
});







$botman->hears('show_commandes', function($bot) {
    $user = $bot->getUser();
    // Access first name
    $firstname = $user->getFirstName();
    $lastname = $user->getLastName();
    $facebook=$firstname.'-'.$lastname;
    $commandes = Commande::where('facebook',$facebook)->get();
    foreach ($commandes as $commande) {
        $bot->reply($commande->product_id);

    }

});
$botman->fallback(function($bot) {
    
    $bot->reply('عذرًا ، لم أستطع فهمك 😕. هذه قائمة بالأوامر التي أفهمها: ..');
});
$botman->hears('show_products', function($bot) {
   
$a=[];
$c='';
$tt=0;
$total=Product::all()->count();
$bot->reply('هاذه قائمة منتجاتنا نتمنى أن تنال إعجابكم');
for ($i=1; $i<=$total ; $i++) { 
$prod = Product::where('categorie_id',$i)->get();
if($prod->count() == 0){
    }
else{
    $bot->typesAndWaits(1);

foreach($prod as $pro){

    $od = Taille::where('product_id',$pro->id)->get();
foreach ($od as $ooo ) {
    $tt=$tt+$ooo->nombre;
    if ($ooo->nombre>0) {

        $c.=$ooo->taille.' ';

    }
       
  }  
$im=$pro->photo;
if($tt<=0){

}else{
    $b= Element::create($pro->nom)
    ->subtitle($c.' : المقاسات المتوفرة '."\n"."سعر المنتوج  : 3000 دج")
    ->image($im)
    ->addButton(ElementButton::create('شراء هذا المنتج')
        ->payload('p'.$pro->id)
        ->type('postback'))
        ->addButton(ElementButton::create('تكبير الصورة')
	    ->url($pro->photo));
	
    
       $a[]=$b;
       $c='';
       $tt=0;

    
} }

$n=GenericTemplate::create()
->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
->addElements($a);



    $bot->reply($n);

    $a=[];
    
 }
}
});

$botman->hears('p([0-9]+)', function ($bot, $number) {
    $user = $bot->getUser();
    // Access first name
    $firstname = $user->getFirstName();
    $lastname = $user->getLastName();
    $facebook=$firstname.'-'.$lastname;
    $bot->startConversation(new ExampleConversation($number,$facebook));

});





$botman->hears('Start conversation', BotManController::class.'@startConversation');
/* $botman->hears('العربية', BotManController::class.'@SetLanguageToAr');
$botman->hears('francais', BotManController::class.'@SetLanguageToFr');
 */


