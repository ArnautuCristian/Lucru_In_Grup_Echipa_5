<?php
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
// Add MethodOverride middleware
$methodOverrideMiddleware = new MethodOverrideMiddleware();
$app->add($methodOverrideMiddleware);
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../routes/web.php';
$app->run();