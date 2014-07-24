<?php

require_once realpath(__DIR__.'/../vendor/autoload.php');

// required by DateTime object
// should probably get this from
// configuration file.
date_default_timezone_set('America/New_York');

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/', function () use ($app) {
  new SuggestedDeposit(new Envelope());
  return 'Hello World.';
});

$app->run();
