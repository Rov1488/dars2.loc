<?php
//include "autoload.php";
include "config/init.php";
require __DIR__ . '/vendor/autoload.php';
use core\Application;
/*MVC shablonlar sayti
https://habr.com/ru/articles/150267/
https://ruseller.com/lessons.php?id=666
*/

$app = new Application();
$app->run();




