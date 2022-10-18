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

declare (strict_types = 1);

/**
 *
 * Require Autoload
 *
 */
require_once __DIR__ . "/vendor/autoload.php";

/**
 *
 * All Data telegram bot api
 *
 */

require_once __DIR__ . "/app/Telegram/Hooks/Data.php";

/**
 *
 * All Controller files
 *
 */

foreach (glob(__DIR__ . "/app/Controller/*.php") as $filename): include $filename;endforeach;
