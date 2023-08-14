<?php

declare(strict_types=1);


define('SYSGRAM_DIR', __DIR__ . '/');

require SYSGRAM_DIR . '/vendor/autoload.php';
require SYSGRAM_DIR . '/bootstrap/app.php';

handle_request();
