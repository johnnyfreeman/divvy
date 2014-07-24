<?php

namespace Divvy\Collection\Provider;

use Divvy\CollectionProvider;

class Transactions extends CollectionProvider
{
  const COLLECTION_CLASS_NAME = 'Divvy\\Collection\\Transactions';
  const TABLE_NAME = 'transactions';

  public function between($date1, $date2)
  {
    // todo
  }
}
