<?php

class Transaction extends Entity
{
  public $amount;
  public $dateTime;
  public $description;

  public function __constuct(object $t)
  {
    $this->dateTime = $t->dateTime;
    $this->description = $t->description;
    $this->amount = $t->amount;
  }

  public function commit() {
    if (is_null($this->dateTime)) {
      $this->$dateTime = new DateTime();
    }
  }

  public function split() {
    // todo
  }

  public function mergeWith(Transaction $transaction) {
    // todo
  }
}
