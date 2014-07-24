<?php

namespace Divvy;

abstract class ModelProvider
{
  // model class name
  protected $_model;

  // db table name
  protected $_table;

  public function __construct($app)
  {
    $this->_app = $app;
  }

  public function get($id)
  {
    // todo
  }
}
