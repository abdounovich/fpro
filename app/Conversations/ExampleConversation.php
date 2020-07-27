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
use BotMan\BotMan\Messages\Conversations\Conversation;

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
       
           

        $this->tbl=Taille::where('product_id', $this->m)->get();


        foreach ($this->tbl as $t ) {

            if ($t->nombre>0) {
               
           
            $this->arr[]=Button::create($t->taille)->value($t->taille);
           }  } 
    $question = Question::create(' إختر المقاس الذي يناسبك بالضغط على زر من القائمة أسفله ')->addButtons($this->arr);
        $this->ask($question, function (Answer $answer) {
        $this->taille=$answer->getText(); 
        $this->tb=Taille::where('product_id',$this->m)->where('taille',$this->taille)->first();
        $this->tbl=Taille::where('product_id',$this->m)->where('taille',$this->taille)
        ->update(array('nombre' =>  $this->tb->nombre-1));  
        $this->sup=Product::where('id',$this->m)->first();

                // Save result
        $this->bot->reply('تبقت مرحلة أخيرة فقط');

        $this->ask(' من فضلك أدخل رقم هاتفك', function(Answer $answer) {
                // Save result
        $this->phone = $answer->getText();
        $this->bot->reply(' 🛒 تأكيد الطلبية');
        $this->attachment = new Image($this->sup->photo, [
            'custom_payload' => true,
        ]);
        
        // Build message object
        $this->message = OutgoingMessage::create('This is my text')
                    ->withAttachment( $this->attachment);
        
        // Reply message object
      
        $this->bot->reply($this->message);
        $this->bot->reply('  سعر المنتج:  3000 دج 💵');
        $this->bot->reply(' 📐 المقاس :'.$this->taille); 
        $question=Question::create('  رقم الهاتف ☎ '.$this->phone)->addButtons([
            Button::create(' ✅ تأكيد الطلبية')->value('yes'),
            Button::create(' ❎ إلغاء الطلب')->value('no'),
        ]);
        $this->ask($question, function (Answer $answer) {

            
            if($answer->getValue() === 'yes') {
                $this->add();

            }
            else{ $this->bot->reply('لقد تم إلغاء طلبك ');
                return true;}
        });
    
       
               
            }); 
    });
        
    
    }

    public function add()
    {
        
    $c=new Commande();
      $c->product_id=$this->m;;
      $c->telephone=$this->phone;
      $c->type='1';
      $c->taille=$this->taille;
      $c->facebook= $this->f;
      $c->save();
      $this->say('عظيم 👏 هذا كل شيء سوف نتصل بكم قريبا... '.$this->firstname);
    }
    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}
