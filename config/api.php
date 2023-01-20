<?php

return [
    /**
     * Use a custom token for the API authentification.
     */
    'token' => env('API_TOKEN', config('app.key')),
];