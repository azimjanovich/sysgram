<?php

namespace App\Telegram;

class Key
{
    private array $keyboards;

    public static function board(array $keyboards = [], string $type = 'inline',   bool $resizeKeyboard = true, int $column = 1)
    {
        self::$keyboards = array_chunk($keyboards, $column);
        return json_encode([
            'resize_keyboard' => $resizeKeyboard,
            ($type == 'inline' ? 'inline_keyboard' : 'keyboard') => self::$keyboards
        ]);
    }
}
