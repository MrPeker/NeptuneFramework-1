<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath('.') . DS);
define('DEFAULT_APP', 'production');

require_once ROOT . 'vendor\autoload.php';

use Libs\Router\Router;
use Libs\Url\Url;

$app = new Router();

new Url('/NeptuneFramework');

if (opendir('applications/production/routers'))
{
  $routers = glob('applications/production/routers/*');
  array_pop($routers);
  foreach($routers as $route)
  {
    require_once $route;
  }
}

$app->run();
