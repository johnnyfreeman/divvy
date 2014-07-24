<?php

namespace Divvy\Model\Provider;

use Divvy\ModelProvider;
use PDO;

class Transaction extends ModelProvider
{
  const MODEL_CLASS_NAME = 'Divvy\\Model\\Transaction';
  const TABLE_NAME = 'transactions';

  public function get($id)
  {
    $provider = get_called_class();
    $model = $provider::MODEL_CLASS_NAME;

    // execute query and store statement
    $statement = $this->_app['db']->query('SELECT * FROM ' . $provider::TABLE_NAME . ' WHERE id = ' . $id);

    // return each row as model
    $result = $statement->fetchAll(PDO::FETCH_CLASS, $model);

    return new $model($result);
  }
}
