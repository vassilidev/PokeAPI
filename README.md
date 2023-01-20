
# Observia - Technical Test - PokéAPI


My Technical test made in 3 hours.
## Tech Stack

**Client:** Vue 3

**Server:** PHP 8.2, Laravel 9.19.


## Installation

Install my-project with npm

```bash
  composer i
  php artisan key:generate
  yarn i
```
    
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`API_KEY` (php artisan key:generate)

`API_TOKEN` (Make your choice :D)

`VITE_API_TOKEN` ("${API_TOKEN}")

`POKEAPI_BASE_URL` (https://pokeapi.co/api/v2/)


## API Reference

#### Get all pokemons

```http
  GET /api/pokemon
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |
| `limit` | `integer` | (Optional) How many records do you want. |
| `offset` | `string` | (Optional) Where to start ? |

#### Get pokemon data

```http
  GET /api/pokemon/${pokemon}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `api_key` | `string` | **Required**. Your API key |
| `pokemon` | `string or integer` | **Required**. Id or pokemon name |


## Optimizations

**Front** : Use VueX Store to handle API call and state between tabs.

**Back** : Cache pokemon data for long TTL

## Authors

- [@vassilidev](https://www.github.com/vassilidev)
