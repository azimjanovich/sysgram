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

use CURLFile;

trait AvailableMethods
{
    public function sendMessage($chat_id, $text, string $parse_mode = null, bool $disable_web_page_preview = null, $reply_to_message_id = null, $reply_markup = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'disable_web_page_preview' => is_null($disable_web_page_preview) ? env('DISABLE_WEB_PAGE_PREVIEW') ?? 'html' : $disable_web_page_preview,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendMessage', $message);
    }

    public function forwardMessage($chat_id, $from_chat_id, $message_id)
    {
        $message = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id
        ];
        return $this->bot('forwardMessage', $message);
    }

    public function copyMessage($chat_id, $from_chat_id, $message_id)
    {
        $message = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id
        ];
        return $this->bot('copyMessage', $message);
    }

    public function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'photo' => $photo,
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendPhoto', $message);
    }

    public function sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $title = null, $performer = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'audio' => $audio,
            'caption' => $caption,
            'duration' => $duration,
            'title' => $title,
            'performer' => $performer,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendAudio', $message);
    }

    public function sendDocument($chat_id, $document, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'document' => $document,
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendDocument', $message);
    }

    public function sendDocumentServer($chat_id, $document, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'document' => new CURLFile($document),
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendDocument', $message);
    }

    public function sendVideo($chat_id, $video, $caption = null, $duration = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'video' => $video,
            'caption' => $caption,
            'duration' => $duration,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendVideo', $message);
    }

    public function sendAnimation($chat_id, $animation, $caption = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'animation' => $animation,
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendAnimation', $message);
    }

    public function sendVoice($chat_id, $voice, $caption, $duration = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'voice' => $voice,
            'caption' => $caption,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendVoice', $message);
    }

    public function sendVideoNote($chat_id, $video_note, $caption = null, $duration = null, $length = null, $parse_mode = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'video_note' => $video_note,
            'caption' => $caption,
            'duration' => $duration,
            'length' => $length,
            'parse_mode' => is_null($parse_mode) ? env('PARSE_MODE') ?? 'html' : $parse_mode,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendVideoNote', $message);
    }

    public function sendMediaGroup($chat_id, $media, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'media' => $media,
            'reply_to_message_id' => $reply_to_message_id,
        ];
        return $this->bot('sendMediaGroup', $message);
    }

    public function sendLocation($chat_id, $latitude, $longitude, $horizontal_accuracy, $live_period = null, $heading = null, $proximity_alert_radius = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $live_period,
            'heading' => $heading,
            'horizontal_accuracy' => $horizontal_accuracy,
            'proximity_alert_radius' => $proximity_alert_radius,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendLocation', $message);
    }

    public function sendVenue($chat_id, $latitude, $longitude, $title, $address, $foursquare_id = null, $foursquare_type = null, $google_place_id = null, $google_place_type = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquare_id,
            'foursquare_type' => $foursquare_type,
            'google_place_id' => $google_place_id,
            'google_place_type' => $google_place_type,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendVenue', $message);
    }

    public function sendContact($chat_id, $phone_number, $first_name, $last_name = null, $vcard = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'vcard' => $vcard,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendContact', $message);
    }

    public function sendPoll($chat_id, $question, array $options, $is_anonymous = null, $type = null, $allows_multiple_answers = false, $correct_option_id = null, $explanation = null, $explanation_parse_mode = null, $explanation_entities = null, $open_period = null, $close_date = null, $is_closed = null, $reply_markup = null, $reply_to_message_id = null)
    {
        $message = [
            'chat_id' => $chat_id,
            'question' => $question,
            'options' => $options,
            'is_anonymous' => $is_anonymous,
            'type' => $type,
            'allows_multiple_answers' => $allows_multiple_answers,
            'correct_option_id' => $correct_option_id,
            'explanation' => $explanation,
            'explanation_parse_mode' => $explanation_parse_mode,
            'explanation_entities' => $explanation_entities,
            'open_period' => $open_period,
            'close_date' => $close_date,
            'is_closed' => $is_closed,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        ];
        return $this->bot('sendPoll', $message);
    }

    public function sendChatAction($chat_id, $action)
    {
        $message = [
            'chat_id' => $chat_id,
            'action' => $action
        ];
        return $this->bot('sendChatAction', $message);
    }

    public function getFile($file_id)
    {
        $message = [
            'file_id' => $file_id
        ];
        return $this->bot('getFile', $message);
    }

    public function answerCallbackQuery($callback_query_id, $text = null, $show_alert = null, $url = null, $cache_time = null)
    {
        $message = [
            'callback_query_id' => $callback_query_id,
            'text' => $text,
            'show_alert' => $show_alert,
            'url' => $url,
            'cache_time' => $cache_time
        ];
        return $this->bot('answerCallbackQuery', $message);
    }
}
