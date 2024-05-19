<?php

use Dotenv\Dotenv;

$env = Dotenv::createImmutable(SYSGRAM_DIR);

function env($key)
{
    global $env;
    return $env->load()[$key] ?? null;
}

function request()
{
    is_null(json_decode(file_get_contents('php://input'))) ? $data = $_REQUEST : $data = json_decode(file_get_contents('php://input'));

    if (filter_var(env("REQUEST_JSON_FORMAT") ?? true, FILTER_VALIDATE_BOOLEAN)) {
        return json_decode(
            json_encode([
                'header' => getallheaders(),
                'body' => $data ?? null,
                'tg' => [
                    'message' => $data?->callback_query ?? false ? $data?->callback_query : $data?->message ?? null,
                    'text' => mb_convert_encoding($data?->message?->text ?? '', 'UTF-8', 'auto'),
                    'data' => mb_convert_encoding($data?->message?->data ?? '', 'UTF-8', 'auto')
                ]
            ], JSON_FORCE_OBJECT)
        );
    }

    return [
        'header' => getallheaders(),
        'body' => (array)$data ?? null,
        'tg' => [
            'message' => (array)($data?->callback_query ?? false ? $data?->callback_query : $data?->message ?? null),
            'text' => mb_convert_encoding($data?->message?->text ?? '', 'UTF-8', 'auto'),
            'data' => mb_convert_encoding($data?->message?->data ?? '', 'UTF-8', 'auto')
        ]
    ];
}

function db()
{
    try {

        $config = array(
            'driver' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => env('DB_PREFIX'),
        );

        $connection = new \Pixie\Connection('mysql', $config);
        return new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
    } catch (Exception $e) {

        log($e);
        return "Error: " . $e;
    }
}

function dd($exp)
{
    var_dump($exp);
    die();
}

function view($view_name, $data = [])
{
    include SYSGRAM_DIR . "views/{$view_name}.php";
}

function back($data = [])
{
    if (!empty($data)) {
        @session_start();
        $_SESSION['data'] = $data;
        @session_write_close();
    }
    return header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function http(string $url, array $data = [],  $type = null)
{
    $ci = curl_init();
    curl_setopt_array($ci, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => !is_null($type),
        CURLOPT_POSTFIELDS => $data
    ]);
    $response = curl_exec($ci);
    return json_decode($response);
}

function log($message,string $status = 'ERROR')
{
    $message = date("[ d-m-Y H:i:s ] ") . "|*" . $status . "*| " . $message . "\n";
    error_log($message, 3, SYSGRAM_DIR . '/storage/logs/sysgram.log');
}
