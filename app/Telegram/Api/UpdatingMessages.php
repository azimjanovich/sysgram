<?php

/**
 * This file is part of the Sysgram package.
 *
 * @author                       Javlonbek Tuychiyev
 * @author                       Javlonbek Tuychiyev <https://t.me/technolang>
 * @copyright                    President Tuychiyev <j.a.tuychiyev@gmail.com>
 *
 * @package composer             composer require azimjanovich/sysgram
 * @package git                  https://github.com/azimjanovich/sysgram.git
 * @version sysgram              Sysgram v 1.3
 * @version php                  >= v 8.0.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @link https://core.telegram.org/bots/api                 Documentation for the function.
 * @see https://github.com/azimjanovich/sysgram/README.md        You can get the full guide to using the index from
 *
 */

namespace App\Telegram\Api;

trait UpdatingMessages
{

    public function editMessageText($chat_id, $message_id = null, $inline_message_id = null, $text, $parse_mode = null, $disable_web_page_preview = null, $reply_markup = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'text' => $text,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'disable_web_page_preview' => is_null($disable_web_page_preview) ? env('DISABLE_WEB_PAGE_PREVIEW') ?? 'html' : $disable_web_page_preview,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('editMessageText', $message);
    }

    public function editMessageCaption($chat_id, $message_id = null, $inline_message_id = null, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('editMessageCaption', $message);
    }

    public function editMessageMedia($chat_id, $message_id = null, $inline_message_id = null, $media, $reply_markup = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'media' => $media,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('editMessageText', $message);
    }

    public function editMessageReplyMarkup($chat_id, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('editMessageReplyMarkup', $message);
    }

    public function stopPoll($chat_id, $message_id, $reply_markup = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('stopPoll', $message);
    }

    public function deleteMessage($chat_id, $message_id)
    {
        $message = [
            'chat_id' => $chat_id,
            'message_id' => $message_id
        ];
        return $this->bot('deleteMessage', $message);
    }
}
