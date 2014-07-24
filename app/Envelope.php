<?php

class Envelope
{
  public $currentAmount;
  public $targetAmount;
  public $targetDate;
  public $description;

  protected $_suggestedDeposit;

  public function suggestedDepositAmount()
  {
    if (!($this->_suggestedDeposit instanceof SuggestedDeposit)) {
      $this->_suggestedDeposit = new SuggestedDeposit($this);
    }
    return $this->_suggestedDeposit->amount();
  }
}
