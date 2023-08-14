<?php

namespace App\Controllers;

use App\Telegram\Bot;

class WebController extends Bot
{
    public function index()
    {
        return view("app");
    }

    public function setWebhook()
    {
        $response = http('https://api.telegram.org/bot' . env('TOKEN') . '/setwebhook?url=' . trim(request()->body->url));
        $message = [
            'status' => $response->ok,
            'text' => $response->description
        ];

        return back($message);
    }
}
