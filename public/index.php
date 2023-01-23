<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Config;
use Sdk\App;
use Sdk\Middleware\HttpBasicAuth;

$config = new Config();

$app = new App($config);

$app->view('/', 'Api.html');
$app->post('/api/deshorten', 'Api::deshorten');

$app->run();