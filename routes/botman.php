<?php
use App\Product;
use App\Conversations\ExampleConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\Drivers\Facebook\Extensions\Button;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\MediaAttachmentElement;




   
   
 
$botman = resolve('botman');

$botman->hears('mmm', function($bot){

    $lo= env('APP_URL');

    $bot->reply($lo.'/images/avatar/1.png');
});


$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});
$botman->hears('show_products', function($bot) {
  
$a=[];
$total=Product::all()->count();
$bot->reply($total);
for ($i=1; $i<=$total ; $i++) { 
$prod = Product::where('categorie_id',$i)->get();
if($prod->count() == 0){
   }
else{
    $bot->typesAndWaits(1);

foreach($prod as $pro){

$im='https://www.dropbox.com/home/Applications/ajmoda/'.$pro->photo;
    $b= Element::create($pro->nom)
    ->subtitle('المقاسات المتوفرة : S M L XL XXL')
    ->image($im)
    ->addButton(ElementButton::create('احجز')
        ->payload('p'.$pro->id)
        ->type('postback'));
       $a[]=$b;
    
} 

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

    $facebook = $user->getFirstName().' '.$user->getLastName();
    $bot->startConversation(new ExampleConversation($number,$facebook));

});




$botman->hears('1', function ($bot) {
    $bot->typesAndWaits(1);


    $attachment = new Image('https://www.dropbox.com/s/h0porkewt992bra/cz6N7OGKx0GDeOrzxNcXT6GhSNSucjaHaaRC8p0T.jpeg?raw=1', [
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

$bot->reply($firstname . "-".$lastname. ' : مرحبا بك ☺ ');
$bot->reply( 'تشرفنا زيارتك لصفحة AJMODA');
$bot->reply(ButtonTemplate::create('كيف يمكننا خدمتك')
	->addButton(ElementButton::create('تصفح سلعنا ؟')
	    ->type('postback')
	    ->payload('show_products')
	)
	->addButton(ElementButton::create('استفسار؟')
	    ->url('http://botman.io/')
	)
);
   
});




$botman->hears('Start conversation', BotManController::class.'@startConversation');
/* $botman->hears('العربية', BotManController::class.'@SetLanguageToAr');
$botman->hears('francais', BotManController::class.'@SetLanguageToFr');
 */


