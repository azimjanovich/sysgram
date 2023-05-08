<?php
declare(strict_types=1);
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

namespace Sysgram\Utility;

use Dotenv\Dotenv;
use Exception;
use Sysgram\Exceptions\Handler;

class Env
{

    public static function get($key, $default = null)
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../", '.env');
        $dotenv->load();
        if (empty($_ENV[$key])): return $default; endif;
        return $_ENV[$key];
    }

}