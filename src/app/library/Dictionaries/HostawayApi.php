<?php

namespace PhoneBook\Dictionaries;

use GuzzleHttp\Client;

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

    public function __construct(CacheStorage $cache)
    {
        $this->cache = $cache;
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
            $timezones = [];
        }

        return $timezones;
    }
}
