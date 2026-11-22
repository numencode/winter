<?php

/*
|--------------------------------------------------------------------------
| Keep .env Values Out Of The Process Environment
|--------------------------------------------------------------------------
|
| With putenv() the .env values are shared by the whole process. Under a
| threaded server (mod_php on Windows) PHP removes them at the end of one
| request while another is still running, which then falls back to the
| config defaults (e.g. the sqlite connection and another session cookie).
| Without putenv() each request keeps its values in $_ENV and $_SERVER.
|
*/

Illuminate\Support\Env::disablePutenv();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Winter\Storm\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Winter\Storm\Foundation\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Winter\Storm\Foundation\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Winter\Storm\Foundation\Exception\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
