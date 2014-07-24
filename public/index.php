<?php

use Divvy\DB;
use Divvy\Collection\Provider\Envelopes;
use Divvy\Collection\Provider\Transactions;
use Divvy\Model\Provider\Transaction;
use Divvy\Model\Provider\Envelope;
use Silex\Application;


// get classloader
$classloader = require_once realpath(__DIR__.'/../vendor/autoload.php');


// required by DateTime object
// should probably get this from
// configuration file.
date_default_timezone_set('America/New_York');


$app = new Application();


$app['debug'] = true;

// database connection
$app['db'] = $app->share(function () {
    return new Divvy\DB();
});

// data providers
$app['Envelopes'] = $app->share(function ($app) {
    return new Envelopes($app);
});
$app['Envelope'] = $app->share(function ($app) {
    return new Envelope($app);
});
$app['Transactions'] = $app->share(function ($app) {
    return new Transactions($app);
});
$app['Transaction'] = $app->share(function ($app) {
    return new Transaction($app);
});

$app['Transactions']->between(1, 2);

$app->get('/', function () use ($app) {
  return $app->json($app['Transactions']->all(), 200);
});


$app->run();
