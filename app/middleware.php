<?php
declare(strict_types=1);

use App\Application\Middleware\AuthMiddleware;
use App\Application\Middleware\TrafficMiddleware;
use Slim\App;

return function (App $app) {
    $app->add(AuthMiddleware::class);
    $app->add(TrafficMiddleware::class);
    $app->add(new RKA\Middleware\IpAddress());
    $app->addRoutingMiddleware();
    $app->addBodyParsingMiddleware();
};
