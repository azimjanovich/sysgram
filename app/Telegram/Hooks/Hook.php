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

namespace Sysgram\Telegram\Hooks;

use Sysgram\Exceptions\Handler;
use Sysgram\Utility\Env;
use Exception;

class Hook
{

    public static function bot($method, $data = [], $token = null)
    {

        try {
            $url = "https://api.Telegram.org/bot" . is_null($token) ? Env::get("TOKEN") : $token . "/" . $method;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $res = curl_exec($ch);
            if (curl_error($ch)) :
                Handler::log(curl_error($ch));
                return curl_error($ch);
            else :
                return json_decode($res);
            endif;
        } catch (Exception $e) {

            Handler::log($e);
            return "Error: " . $e;
        }
    }
}
