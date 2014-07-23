<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
  new Envelope();
  return 'Hello World.';
});

$app->run();
