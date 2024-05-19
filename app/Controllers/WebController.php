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
        $response = http(env('BASE_BOT_URL') . env('TOKEN') . '/setwebhook?url=' . trim(request()->body->url));
        $message = [
            'status' => $response->ok,
            'text' => $response->description
        ];

        return back($message);
    }
}
