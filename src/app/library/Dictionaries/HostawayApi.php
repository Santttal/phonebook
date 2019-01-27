<?php

namespace PhoneBook\Dictionaries;

use Guzzle\Http\Client;

class HostawayApi implements CountryStorage, TimezoneStorage
{
    const BASE_URL = 'https://api.hostaway.com/';
    const COUNTRIES_URI = 'countries';
    const TIMEZONES_URI = 'timezones';

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client(self::BASE_URL);
    }

    /**
     * @return array
     */
    public function loadCountries(): array
    {
        try {
            $response = $this->client->get(self::COUNTRIES_URI)->send();
            $responseArray = json_decode($response->getBody(true), true);
            $countries = $responseArray['result'];
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
        try {
            $response = $this->client->get(self::TIMEZONES_URI)->send();
            $responseArray = json_decode($response->getBody(true), true);
            $timezones = $responseArray['result'];
        } catch (\Exception $e) {
            $timezones = [];
        }

        return $timezones;
    }
}
