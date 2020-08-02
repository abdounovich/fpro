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
    

    $attachment = new Image('https://res.cloudinary.com/ds9qfm1ok/image/upload/v1596142524/bot-new-0_clabyz.png');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
    ->withAttachment($attachment);
    
    // Reply message object
    $bot->typesAndWaits(1);
    

    $bot->reply($message);

    $user = $bot->getUser();
// Access first name
$firstname = $user->getFirstName();
$lastname = $user->getLastName();
$bot->typesAndWaits(1);


$bot->reply($firstname . "-".$lastname. ' : مرحبا بك 🙋‍♂ ');
$bot->typesAndWaits(1);
$bot->reply( '☺ تشرفنا زيارتك لصفحة AJMODA  ');
$bot->typesAndWaits(1);
$bot->typesAndWaits(1);
$bot->typesAndWaits(1);
$bot->reply(ButtonTemplate::create('  أنا الشات بوت 🤖 سأتواصل معك تلقائيا كيف يمكنني خدمتك ؟  ')

->addButton(ElementButton::create('🤔 طريقة الشراء ')
->type('postback')
->payload('steps')
)
    ->addButton(ElementButton::create(' 🛍 منتجاتنا ')
    ->type('postback')
    ->payload('show_products')
)
  
	->addButton(ElementButton::create('💬 استفسار ')
	    ->url('https://www.messenger.com/t/merahi.adjalile')
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
    $total=Commande::where('facebook',$facebook)->count();
if ($total==0) {
  $bot->reply("عفوا لا توجد أي طلبية مسجلة بإسمك");
}
else{
    $ray=[];
    $bot->reply(' لديك : '.$total.' طلبية ');
    foreach ($commandes as $commande) {
        
        $b= Element::create($commande->product->nom)
        ->subtitle('السعر : '.$commande->product->prix."\n".$commande->taille.' : المقاس  ')
        ->image($commande->product->photo)
        ->addButton(ElementButton::create(' إلغاء الطلبية')
            ->payload('annuler'.$commande->id)
            ->type('postback'));
        
           $ray[]=$b;


    
    $n=GenericTemplate::create()
->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
->addElements($ray);



    $bot->reply($n);
    $ray=[];}}

});
$botman->fallback(function($bot) {
    
  
    $bot->reply(ButtonTemplate::create('عذرًا ، لم أستطع فهمك 😕 '."\n". 'هذه قائمة بالأوامر التي أفهمها:')
	->addButton(ElementButton::create('🛍 منتجاتنا')
	    ->type('postback')
	    ->payload('show_products')
    )
 
	
    ->addButton(ElementButton::create('💬 استفسار ')
    ->url('https://www.messenger.com/t/merahi.adjalile')

    )
    ->addButton(ElementButton::create('🤔 طريقة الشراء ')
	    ->type('postback')
	    ->payload('steps')
	)
);
});
$botman->hears('steps', function($bot) {
    $bot->typesAndWaits(1);

$bot->reply(' 🤭  لتسهيل عملية الشراء إختصرتها لك في أربع مراحل بسيطة للغاية  😁 : ');
$bot->typesAndWaits(1);

$bot->reply('1⃣ :  اختر المنتج  واللون واضغط على زر شراء الموجود أسفل كل صورة ');
$bot->typesAndWaits(1);

$bot->reply('2⃣ : إختر المقاس المناسب  لك بالضغط على أحد الأزرار من  القائمة');
$bot->typesAndWaits(1);

$bot->reply('3⃣ :  أدخل  رقم  هاتفك لكي نتصل بك من أجل تأكيد طلبيتك ');
$bot->typesAndWaits(1);

$bot->reply('4⃣ :  تحقق   من   المعلومات  السابقة   '."\n".'  ثم اضغط على زر تأكيد الطلبية  ');
$bot->typesAndWaits(1);
$bot->reply(' بعد قيامك بهاته المراحل الأربعة تكون قد أتتمت عملية الشراء سيتصل بك بعدها أحد أعضاء الصفحة لتأكيد طلبيتك  ');
$bot->typesAndWaits(1);

$bot->reply(ButtonTemplate::create('    يمكنك الآن البدأ في التسوق بكل سهولة  😍 ')
->addButton(ElementButton::create('🛍 إبدأ التسوق الآن')
    ->type('postback')
    ->payload('show_products')
)

);





});
    $botman->hears('show_products', function($bot) {
   
$a=[];
$c='';
$tt=0;
$total=Product::all()->count();
$bot->reply('😁 هاته قائمة منتجاتنا نتمنى أن تنال إعجابك 👌 :');
for ($i=1; $i<=$total ; $i++) { 
$prod = Product::where('categorie_id',$i)->get();
if($prod->count() == 0){
    }
else{
    $bot->typesAndWaits(1);

foreach($prod as $pro){

    $od = Taille::where('product_id',$pro->id)->orderBy('id', 'ASC')->get();
foreach ($od as $ooo ) {
    $tt=$tt+$ooo->nombre;
    if ($ooo->nombre>0) {

        $c.=$ooo->taille.' ';

    }
       
  }  
$im=$pro->photo;
if($tt<=0){

}else{
    $da="دج";
   $price="  سعر المنتوج  💵 :         ".$pro->prix." ".$da;
   $talle=$c.":✌ المقاس المتوفر";
    $b= Element::create($pro->nom)
    ->subtitle($price."\n".$talle)
    ->image($im)
    ->addButton(ElementButton::create('   🛒  شراء هذا المنتج  ')
        ->payload('p'.$pro->id)
        ->type('postback'))
        ->addButton(ElementButton::create('   🔍 تكبير الصورة  ')
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
    $bot->reply('  أحسنت الإختيار 😍 ');
    $bot->startConversation(new ExampleConversation($number,$facebook));

});

$botman->hears('annuler([0-9]+)', function ($bot,$number) {
   $commande=Commande::where('id',$number)->first();
    $taille=Taille::where('product_id',$commande->product_id)->where('taille',$commande->taille)->first();
        $tbl=Taille::where('product_id',$commande->product_id)->where('taille',$commande->taille)
        ->update(array('nombre' => $taille->nombre+1));  
        $commande->delete();
        $bot->reply('تم إلغاء الطلبية بنجاح');

});





$botman->hears('Start conversation', BotManController::class.'@startConversation');
/* $botman->hears('العربية', BotManController::class.'@SetLanguageToAr');
$botman->hears('francais', BotManController::class.'@SetLanguageToFr');
 */


