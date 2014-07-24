<?php

class SuggestedDeposit extends Deposit
{
  public function __construct(Envelope $e)
  {
    // save reference to envelope
    $this->envelope($e);

    // calculate suggested amount and store
    $deposits = Deposits::between(new DateTime, $e->targetDate);
    $numdeposits = count($deposits);
    $this->amount = $numdeposits > 0 ? $e->targetAmount / count($deposits) : $e->targetAmount;
  }

  // target Envelope
  protected $_targetEnvelope;
  public function envelope(Envelope $e = null)
  {
    if (!is_null($e)) {
      $this->_targetEnvelope = $e;
    }
    return $this->_targetEnvelope;
  }
}
