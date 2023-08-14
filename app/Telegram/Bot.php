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

namespace App\Telegram;

error_reporting(E_ALL ^ E_DEPRECATED);

use App\Telegram\Api\AvailableMethods;
use App\Telegram\Api\InlineMode;
use App\Telegram\Api\UpdatingMessages;

class Bot
{
    use AvailableMethods;
    use InlineMode;
    use UpdatingMessages;

    private const BASE_BOT_URL = "https://api.telegram.org/bot";
    private $token;

    public function __construct($token = null)
    {
        $this->token = (is_null($token) ? env('TOKEN') : $token);
    }

    public function bot($method = null, $data = [])
    {
        $ci = curl_init();
        curl_setopt_array($ci, [
            CURLOPT_URL => trim((env('BASE_BOT_URL') ?? $this::BASE_BOT_URL), '/') . $this->token . '/' . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data
        ]);
        $response = curl_exec($ci);
        return $response;
    }
}
