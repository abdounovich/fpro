<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('1', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
