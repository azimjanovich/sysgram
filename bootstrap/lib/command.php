<?php

$argv = $_SERVER['argv'] ?? null;

if ($argv && $argv[0] == 'artisan' && isset($argv[1])) {
    switch ($argv[1]) {
        case 'serve': {
                $host = 'localhost';
                $port = '8080';
                if (isset($argv[2])) {
                    if (str_contains($argv[2], '--port:')) {
                        $port = explode(':', $argv[2])[1];
                    }
                    if (str_contains($argv[2], '--host:')) {
                        $host = explode(':', $argv[2])[1];
                    }
                }
                if (isset($argv[3])) {
                    if (str_contains($argv[3], '--port:')) {
                        $port = explode(':', $argv[3])[1];
                    }
                    if (str_contains($argv[3], '--host:')) {
                        $host = explode(':', $argv[3])[1];
                    }
                }

                exec('php -S ' . $host . ':' . $port);
                break;
            }

        case 'make:controller': {
                $controllerName = 'ExampleController';
                if (isset($argv[2])) $controllerName = $argv[2];

                $from = __DIR__ . '/../former/ExampleController.php';
                $to = getcwd() . '/app/Controllers/' . $controllerName . '.php';

                if (@copy($from, $to)) {
                    file_put_contents($to, str_replace('class Controller', 'class ' . $controllerName, file_get_contents($to)));

                    exit("\n \e[48;5;45m INFO \e[0m Controller \e[1m[" . $to . "]\e[0m created successfully.\n\n");
                } else {
                    exit("\n \e[48;5;9m ERROR \e[0m Command \"{$argv[2]}\" is not defined. \n\n ❗️ See that a folder with this address has been created. \n\n");
                }

                break;
            }
        case 'make:router': {
                $routerName = 'ExampleRouter';
                if (isset($argv[2])) $routerName = $argv[2];

                $from = __DIR__ . '/../former/ExampleRouter.php';
                $to = getcwd() . '/routers/' . $routerName . '.php';

                if (@copy($from, $to)) {
                    exit("\n \e[48;5;45m INFO \e[0m Router \e[1m[" . $to . "]\e[0m created successfully.\n\n");
                } else {
                    exit("\n \e[48;5;9m ERROR \e[0m Command \"{$argv[2]}\" is not defined. \n\n ❗️ See that a folder with this address has been created. \n\n");
                }

                break;
            }

        default: {
                if (!isset($argv[1])) $argv[1] = null;

                $error = "\n \e[48;5;9m ERROR \e[0m Command \"{$argv[1]}\" is not defined. Did you mean one of these? \n\n \e[2m ▶️ make:controller \n \e[2m ▶️ make:router \n\n";

                exit($error);
                break;
            }
    }
} elseif ($argv) {
    exit("Not found " . $argv[0] . " command");
}
