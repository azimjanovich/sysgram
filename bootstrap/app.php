<?php

// library functions
foreach (glob(__DIR__ .  '/lib/*.php') as $lib) require_once $lib;


// set timezone
date_default_timezone_set(env('TIMEZONE'));
