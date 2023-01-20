<?php

namespace App\Services\PokeApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class PokeApiAbstract
{
    /**
     * Number of Pokémon to fetch per page.
     * @var int
     */
    public int $perPage = 20;

    /**
     * The client to execute api call.
     *
     * @var PendingRequest
     */
    public PendingRequest $client;

    public function __construct()
    {
        $this->client = $this->getClient();
    }

    /**
     * Set up the PokeAPI client with base url.
     *
     * @return PendingRequest
     */
    public function getClient(): PendingRequest
    {
        return Http::baseUrl(config('pokeapi.base_url'));
    }
}