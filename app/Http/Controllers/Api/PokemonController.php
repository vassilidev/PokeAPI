<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PokeApiRequest;
use App\Http\Resources\Api\PokeApi\PokemonDetailResource;
use App\Services\PokeApi\Pokemon\PokemonDetailsService;
use App\Services\PokeApi\Pokemon\PokemonListService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PokemonController extends Controller
{
    /**
     * Set up the services.
     *
     * @param PokemonListService    $pokemonListService
     * @param PokemonDetailsService $pokemonDetailsService
     */
    public function __construct(
        public PokemonListService    $pokemonListService,
        public PokemonDetailsService $pokemonDetailsService,
    ) {}

    /**
     * Get Pokémon from the API.
     *
     * @param PokeApiRequest $request
     *
     * @return array
     */
    public function index(PokeApiRequest $request): array
    {
        return $this->pokemonListService->get($request);
    }

    /**
     * @param $pokemon
     *
     * @return PokemonDetailResource|JsonResponse
     */
    public function details($pokemon)
    {
        $details = $this->pokemonDetailsService->get($pokemon);

        if (!$details) {
            return response()
                ->json(
                    Response::$statusTexts[Response::HTTP_NOT_FOUND],
                    Response::HTTP_NOT_FOUND
                );
        }

        return new PokemonDetailResource($details);
    }
}
