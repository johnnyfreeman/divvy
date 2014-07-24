<?php

require_once realpath(__DIR__.'/../vendor/autoload.php');

$app = new Silex\Application();

$app->get('/', function () use ($app) {
  new SuggestedDeposit(new Envelope());
  return 'Hello World.';
});

$app->run();
