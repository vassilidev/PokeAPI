<?php

namespace App\Http\Resources\Api\PokeApi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'     => $this['id'],
            'name'   => $this['name'],
            'height' => $this['height'],
            'weight' => $this['weight'],
            'image'  => !empty($this['sprites']['front_default'])
                ? base64_encode(file_get_contents($this['sprites']['front_default']))
                : '',
            'types'  => $this['types'],
        ];
    }
}
