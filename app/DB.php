<?php

namespace Divvy;

use PDO;

class DB
{
  const DSN = 'mysql:host=localhost;dbname=divvy';
  const USER = 'root';
  const PASS = '';

  protected $_connection;

  function __construct($options = array())
  {
    $this->_connection = new PDO(self::DSN, self::USER, self::PASS, $options);
    $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function query($qry)
  {
    return $this->_connection->query($qry);
  }

  public function prepare($qry)
  {
    return $this->_connection->prepare($qry);
  }
}
