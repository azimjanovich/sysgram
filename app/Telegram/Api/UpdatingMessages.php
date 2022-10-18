<?php

/**
 * This file is part of the Sysgram package.
 *
 * @author                       Javlonbek Tuychiyev
 * @author                       Javlonbek Tuychiyev <https://t.me/DGUuz>
 * @copyright                    President Tuychiyev <j.a.tuychiyev@gmail.com>
 *
 * @package composer             composer require sysgram/sysgram
 * @package git                  https://github.com/sysgram/sysgram.git
 * @version sysgram              Sysgram v 1.3
 * @version php                  >= v 8.0.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @link https://core.telegram.org/bots/api                 Documentation for the function.
 * @see https://github.com/sysgram/sysgram/README.md        You can get the full guide to using the index from
 *
 */

namespace Sysgram\Telegram\Api;

use Sysgram\Telegram\Hooks\Hook;
use Sysgram\Utility\Env;

trait UpdatingMessages
{

    public static function editMessageText($chat_id, $message_id = null, $inline_message_id = null, $text, $parse_mode = null, $disable_web_page_preview = null, $reply_markup = null)
    {
        is_null($parse_mode) ? $parse_mode = Env::get('MESSAGE_PARSE_MODE') : $parse_mode;
        is_null($disable_web_page_preview) ? $disable_web_page_preview = Env::get('DISABLE_WEB_PAGE_PREVIEW') : $disable_web_page_preview;

        return Hook::bot('editMessageText', ['chat_id' => $chat_id, 'message_id' => $message_id, 'inline_message_id' => $inline_message_id, 'text' => $text, 'parse_mode' => $parse_mode, 'disable_web_page_preview' => $disable_web_page_preview, 'reply_markup' => $reply_markup]);
    }

    public static function editMessageCaption($chat_id, $message_id = null, $inline_message_id = null, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        is_null($parse_mode) ? $parse_mode = Env::get('MESSAGE_PARSE_MODE') : $parse_mode;

        return Hook::bot('editMessageCaption', ['chat_id' => $chat_id, 'message_id' => $message_id, 'inline_message_id' => $inline_message_id, 'caption' => $caption, 'parse_mode' => $parse_mode, 'reply_to_message_id' => $reply_to_message_id, 'reply_markup' => $reply_markup]);
    }

    public static function editMessageMedia($chat_id, $message_id = null, $inline_message_id = null, $media, $reply_markup = null)
    {
        return Hook::bot('editMessageMedia', ['chat_id' => $chat_id, 'message_id' => $message_id, 'inline_message_id' => $inline_message_id, 'media' => $media, 'reply_markup' => $reply_markup]);
    }

    public static function editMessageReplyMarkup($chat_id, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        return Hook::bot('editMessageReplyMarkup', ['chat_id' => $chat_id, 'message_id' => $message_id, 'inline_message_id' => $inline_message_id, 'reply_markup' => $reply_markup]);
    }

    public static function stopPoll($chat_id, $message_id, $reply_markup = null)
    {
        return Hook::bot('stopPoll', ['chat_id' => $chat_id, 'message_id' => $message_id, 'reply_markup' => $reply_markup]);
    }

    public static function deleteMessage($chat_id, $message_id)
    {
        return Hook::bot('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $message_id]);
    }

}
