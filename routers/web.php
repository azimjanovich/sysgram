<?php

use App\Controllers\WebController;

return [
    '/' => [WebController::class, 'index'],
    'set-webhook' => [WebController::class, 'setWebhook'],
];
