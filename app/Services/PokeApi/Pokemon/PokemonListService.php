<?php

namespace App\Services\PokeApi\Pokemon;

use App\Http\Requests\Api\PokeApiRequest;
use App\Services\PokeApi\PokeApiAbstract;

class PokemonListService extends PokeApiAbstract
{
    /**
     * @param PokeApiRequest $request
     *
     * @return array
     */
    public function get(PokeApiRequest $request): array
    {
        return $this->client
            ->get('/pokemon', [
                'limit'  => $request->get('limit') ?? $this->perPage,
                'offset' => $request->get('offset') ?? 0,
            ])
            ->json();
    }
}