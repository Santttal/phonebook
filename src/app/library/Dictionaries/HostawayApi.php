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

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::BASE_URL]);
    }

    /**
     * @return array
     */
    public function loadCountries(): array
    {
        try {
            $response = $this->client->get(self::COUNTRIES_URI);
            $responseArray = json_decode($response->getBody()->getContents(), true);
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
            $response = $this->client->get(self::TIMEZONES_URI);
            $responseArray = json_decode($response->getBody()->getContents(), true);
            $timezones = $responseArray['result'];
        } catch (\Exception $e) {
            $timezones = [];
        }

        return $timezones;
    }
}
