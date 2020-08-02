<?php

namespace App\Conversations;

use App\Taille;
use App\Product;
use App\Commande;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;

class ExampleConversation extends Conversation
{
    /**
     * First question
     */
    protected $firstname;
    protected $phone;
    protected $f;
    protected $m;
    protected $arr;
    protected $tbl;
    protected $user;

public function __construct(string $m ,string $f) {

    $this->m = $m;
    $this->f = $f;
    
}

    public function askFirstname(){
        $this->arr=[];
       
           

        $this->tbl=Taille::where('product_id', $this->m)->orderBy('id', 'asc')->get();


        foreach ($this->tbl as $t ) {

            if ($t->nombre>0) {
               
           
            $this->arr[]=Button::create($t->taille)->value($t->taille);
           }  } 

        $question = Question::create(' إختر المقاس المناسب بالضغط على زر من القائمة أسفله :  ')->addButtons($this->arr);
        $this->ask($question, function (Answer $answer) {
        $this->taille=$answer->getText(); 
       if( $this->taille==='S' OR $this->taille==='M' OR $this->taille==='L' OR $this->taille==='XL' OR $this->taille==='XXL'){

    
        $this->bot->reply('  جيد جدا  👌 ');
        $this->askPhone();}
        else {$this->bot->reply('خطأ... يرجى الإختيار من القائمة');
            $this->askFirstname();}

        
    
        
       
        });
    
    
    }

    public function askPhone()
    {$this->ask(' من فضلك أدخل رقم هاتفك  ☎ : ', function(Answer $answer) {
        // Save result
$this->phone = $answer->getText();
if(is_numeric($this->phone)){
$this->bot->reply('   ☺ المرحلة الأخيرة  ');
$this->bot->typesAndWaits(1);
$this->bot->reply(' 🛒 تأكيد الطلبية');  
$this->sup=Product::where('id',$this->m)->first();
$this->attachment = new Image($this->sup->photo, [
    'custom_payload' => true,
]);

// Build message object
$this->message = OutgoingMessage::create('This is my text')
            ->withAttachment( $this->attachment);

// Reply message object

$this->bot->reply($this->message);
$this->bot->reply(' المقاس : ' .$this->taille);
$this->bot->reply('  الهاتف ☎ : '.$this->phone);
$question=Question::create( 'السعر  💵 : '.$this->sup->prix)->addButtons([
    Button::create(' ✅ تأكيد الطلبية')->value('yes'),
    Button::create(' ❎ إلغاء الطلب')->value('no'),
]);
$this->ask($question, function (Answer $answer) {

    
    if($answer->getValue() === 'yes') {

        $this->bot->typesAndWaits(1);
        $this->add();

    }
    elseif($answer->getValue() === 'no'){  $this->bot->reply(ButtonTemplate::create('تم إلغاء طلبك بنجاح ')
        ->addButton(ElementButton::create('🛍 الشراء من جديد')
            ->type('postback')
            ->payload('show_products')
        )
        ->addButton(ElementButton::create(' 🛒 طلبياتي ')
        ->type('postback')
        ->payload('show_commandes')
    )
        ->addButton(ElementButton::create(' 💬 استفسار ')
            ->type('postback')
            ->payload('show_commandes')
        )
    );
        }
});


} else{$this->bot->reply('الرقم الذي أدخلته غير صحيح');
$this->askPhone();}
    }); 
}


    public function add()
    {
        
    $c=new Commande();
      $c->product_id=$this->m;
      $c->telephone=$this->phone;
      $c->type='1';
      $c->taille=$this->taille;
      $c->facebook= $this->f;
      $c->save();



      $this->tb=Taille::where('product_id',$this->m)->where('taille',$this->taille)->first();
      $this->tbl=Taille::where('product_id',$this->m)->where('taille',$this->taille)
      ->update(array('nombre' =>  $this->tb->nombre-1));  
      $this->bot->reply(ButtonTemplate::create(' شكرا لك :  '.$this->f."\n".'✅ لقد تم حفظ طلبك بنجاح '."\n".'سوف نتصل بك قريبا')
      ->addButton(ElementButton::create('🛍 الشراء من جديد')
          ->type('postback')
          ->payload('show_products')
      )
      ->addButton(ElementButton::create(' 🛒 طلبياتي ')
      ->type('postback')
      ->payload('show_commandes')
  )
      ->addButton(ElementButton::create(' 💬 استفسار ')
      ->url('https://www.messenger.com/t/merahi.adjalile')
      )
  );
    }
    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}
