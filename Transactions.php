<?php

class Transactions implements IteratorAggregate
{
  protected $_transactions = array();

  public function __constuct(array $transactions)
  {
    foreach ($transactions as $t) {
      $this->_transactions[] = new Transaction($t);
    }
  }

  public static function between($date1, $date2)
  {
    return new self();
  }

  public function getIterator() {
    return new ArrayIterator($this->_transactions);
  }
}
