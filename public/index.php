<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Middleware\HtmlHeader;
use App\SdkConfig;
use Sdk\App;

$config = new SdkConfig();

$app = new App($config);

$headerMiddleware = new HtmlHeader();
$app->addMiddleware($headerMiddleware);

$app->view('/', 'Home.html');
$app->post('/api/deshorten', 'Main::deshorten');

$app->run();