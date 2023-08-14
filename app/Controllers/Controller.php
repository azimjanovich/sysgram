<?php

namespace App\Controllers;

use App\Telegram\Bot;

class Controller extends Bot
{
    public function index()
    {
        $bot = new Bot();
        echo $bot->sendMessage(request()->tg->message->chat->id, request()->tg->text);
    }
}
