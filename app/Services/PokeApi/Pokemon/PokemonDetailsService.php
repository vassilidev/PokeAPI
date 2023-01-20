<?php

namespace App\Services\PokeApi\Pokemon;

use App\Services\PokeApi\PokeApiAbstract;

class PokemonDetailsService extends PokeApiAbstract
{
    /**
     * Get all the details about this Pokémon.
     *
     * @param $pokemon
     *
     * @return array|null
     */
    public function get($pokemon): array|null
    {
        return $this->client->get("pokemon/$pokemon")->json();
    }
}