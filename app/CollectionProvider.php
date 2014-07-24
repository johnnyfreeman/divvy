<?php

namespace Divvy;

use Enforcer;
use PDO;

abstract class CollectionProvider
{
  // const COLLECTION_CLASS_NAME;
  // const TABLE_NAME;

  public function __construct($app)
  {
    $this->_app = $app;
  }

  public function all()
  {
    $provider = get_called_class();
    $collection = $provider::COLLECTION_CLASS_NAME;

    // execute query and store statement
    $statement = $this->_app['db']->query('SELECT * FROM ' . $provider::TABLE_NAME);

    // return each row as model
    $rows = $statement->fetchAll(PDO::FETCH_CLASS, $collection::MODEL_CLASS_NAME);

    return new $collection($rows);
  }
}
