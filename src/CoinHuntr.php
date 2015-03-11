<?php

namespace Account\MiningPool;

use \Monolog\Logger;
use \Account\Account;
use \Account\Miner;
use \Account\DisabledAccount;
use \Account\SimpleAccountType;
use \Account\AccountFetchException;
use \Apis\FetchHttpException;
use \Apis\Fetch;

/**
 * Represents the CoinHuntr mining pool.
 */
class CoinHuntr extends SimpleAccountType implements Miner, DisabledAccount {

  public function getName() {
    return "CoinHuntr";
  }

  public function getCode() {
    return "coinhuntr";
  }

  public function getURL() {
    return "https://coinhuntr.com/";
  }

  public function getFields() {
    return array(
      // looks like a 64 character hex string
      'api_token' => array(
        'title' => "API key",
        'regexp' => "#^[a-f0-9]{64}$#",
      ),
    );
  }

  /**
   * Get a list of all the currencies supported by this account (e.g. "btc", "ltc", ...).
   * Uses currency codes from openclerk/currencies.
   * May block.
   */
  public function fetchSupportedCurrencies(Logger $logger) {
    return array();
  }

  /**
   * Get a list of all currencies that can return current hashrates.
   * This is not always strictly identical to all currencies that can be hashed;
   * for example, exchanges may trade in {@link HashableCurrency}s, but not actually
   * support mining.
   * May block.
   */
  public function fetchSupportedHashrateCurrencies(Logger $logger) {
    return array();
  }

  /**
   * @return all account balances
   * @throws AccountFetchException if something bad happened
   */
  public function fetchBalances($account, Logger $logger) {
    throw new AccountFetchException("Cannot fetch balances of disabled account");
  }

  /**
   * When was this account type disabled?
   * @return some parseable date string
   */
  public function disabledAt() {
    return "2015-03-11";
  }

}
