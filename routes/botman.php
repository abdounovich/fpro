<?php
use App\Http\Controllers\BotManController;



$config = [
    'facebook' => [
        'token' => 'EAAW2ZByvfRBsBACTZBUqZBYOEpfuSULGK6xGyjv5E5PJHahBhKZATtfCr0fjD2GRT63tACtU0TyCy9q1pgWvr0sqTpybCM6xTFK9Y1CovfCUFDnEY11ZCQkTidNjDsMnswMaC7j8IDnxvfxsU0JZBiCcZCgn9xZCXImwodCtfx7iM4MMRcAeWH2qEvCwFPZApvwQZD',
      'app_secret' => 'ask_123',
      'verification'=>'ask_123',
  ]
];

DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create BotMan instance
BotManFactory::create($config);
$botman = resolve('botman');

$botman->hears('1', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
