<?php

namespace Account\MiningPool\Tests;

use Monolog\Logger;
use Account\AccountType;
use Account\AccountFetchException;
use Account\Tests\AbstractAccountTest;
use Openclerk\Config;
use Openclerk\Currencies\Currency;

/**
 * Abstracts away common test functionality.
 */
abstract class AbstractDisabledMiningPoolTest extends AbstractAccountTest {

  public function __construct(AccountType $type) {
    parent::__construct($type);
  }

  function getAccountsJSON() {
    return __DIR__ . "/../accounts.json";
  }

}
