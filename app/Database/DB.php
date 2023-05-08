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

namespace Sysgram\Database;

use Exception;
use Sysgram\Exceptions\Handler;
use Sysgram\Utility\Env;

class DB
{

    protected static $conn;

    public static function sys()
    {
        try {

            $config = array(
                'driver' => Env::get('DB_CONNECTION'), 
                'host' => Env::get('DB_HOST'),
                'database' => Env::get('DB_DATABASE'),
                'username' => Env::get('DB_USERNAME'),
                'password' => Env::get('DB_PASSWORD'),
                'charset' => Env::get('DB_CHARSET', 'utf8mb4'), 
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => Env::get('DB_PREFIX'), 
            );
            
            $connection = new \Pixie\Connection('mysql', $config);
            return new \Pixie\QueryBuilder\QueryBuilderHandler($connection);

        } catch (Exception $e) {

            Handler::log($e);
            return "Error: " . $e;

        }
    }

}
