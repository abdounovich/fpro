<?php

namespace App\Conversations;

use App\Commande;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
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
protected $user;

public function __construct(string $m ,string $f) {

    $this->m = $m;
    $this->f = $f;
}

    public function askFirstname(){

        
    $question = Question::create('المقياس?')->addButtons([

        Button::create('S')->value('S'),
        Button::create('M')->value('M'),
        Button::create('L')->value('L'),
        Button::create('XL')->value('XL'),
        Button::create('XXL')->value('XLL'),]);

        $this->ask($question, function (Answer $answer) {
        $this->taille=$answer->getText(); 
        $this->bot->reply('Awesome'.$this->taille) ; 
     
                // Save result
    
        $this->ask('تبقت مرحلة أخيرة فقط  .. من فضلك أدخل رقم هاتفك حتى نتواصل معك لتأكيد الطلبية', function(Answer $answer) {
                // Save result
        $this->phone = $answer->getText();
        $this->add();
               
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
      $this->say('Great - that is all we need, '.$this->firstname);
    }
    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}
