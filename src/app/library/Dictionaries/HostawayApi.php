<?php

namespace PhoneBook\Dictionaries;

use GuzzleHttp\Client;
use Phalcon\Logger\AdapterInterface;

class HostawayApi implements CountryStorage, TimezoneStorage
{
    const BASE_URL = 'https://api.hostaway.com/';
    const COUNTRIES_URI = 'countries';
    const TIMEZONES_URI = 'timezones';

    /**
     * @var Client
     */
    private $client;
    /**
     * @var CacheStorage
     */
    private $cache;
    /**
     * @var AdapterInterface
     */
    private $logger;

    public function __construct(CacheStorage $cache, AdapterInterface $logger)
    {
        $this->cache = $cache;
        $this->logger = $logger;
        $this->client = new Client(['base_uri' => self::BASE_URL]);
    }

    /**
     * @return array
     */
    public function loadCountries(): array
    {
        if ($countries = $this->cache->loadCountries()) {
            return $countries;
        }

        try {
            $response = $this->client->get(self::COUNTRIES_URI);
            $responseArray = json_decode($response->getBody()->getContents(), true);
            $countries = $responseArray['result'];
            $this->cache->saveCountries($countries);
        } catch (\Exception $e) {
            $this->logger->error("Can't load countries");
            $countries = [];
        }

        return $countries;
    }

    /**
     * @return array
     */
    public function loadTimezones(): array
    {
        if ($timezones = $this->cache->loadTimezones()) {
            return $timezones;
        }

        try {
            $response = $this->client->get(self::TIMEZONES_URI);
            $responseArray = json_decode($response->getBody()->getContents(), true);
            $timezones = $responseArray['result'];
            $this->cache->saveTimezones($timezones);
        } catch (\Exception $e) {
            $this->logger->error("Can't load timezones");
            $timezones = [];
        }

        return $timezones;
    }
}
