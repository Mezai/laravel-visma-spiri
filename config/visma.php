<?php

return [

    /**
     * The client ID provided by Fortnox for your application.
     */
    'client_id' => env('VISMA_CLIENT_ID', ''),

    /**
     * The client secret provided by Fortnox for your application.
     */
    'client_secret' => env('VISMA_CLIENT_SECRET', ''),

    /**
     * The URL to the Visma API.
     * This package currently only supports version 2.
     */
    'base_url' => env('VISMA_BASE_URL', 'https://eaccountingapi.vismaonline.com/v2'),

    /**
     * The OAuth base URL for Fortnox. This is used for the OAuth flow.
     */
    'oauth_base_url' => env('VISMA_OAUTH_BASE_URL', 'https://identity.vismaonline.com/connect'),


    /**
     * The scopes to request from Fortnox.
     *
     * You can specify the scopes your application needs to access.
     * @see https://www.fortnox.se/developer/guides-and-good-to-know/scopes
     */
    'scopes' => env('VISMA_SCOPES', ''),

    'routes' => [

        /**
         * Middlewares for the Fortnox Oauth routes.
         */
        'middleware' => ['web'],

        'oauth' => [
            /**
             * The route to redirect to when the user wants to authenticate with Fortnox.
             * This should point to the controller that handles the OAuth flow.
             */
            'redirect' => '/oauth/visma',

            /**
             * The route to redirect to after the user has authenticated with Fortnox.
             * This should point to the controller that handles the OAuth callback.
             */
            'callback' => '/oauth/visma/callback',
        ],
    ],

    /**
     * The storage provider to use for storing tokens.
     *
     * This should implement the `BernskioldMedia\Fortnox\Contracts\TokenStorage` interface.
     */
    'storage_provider' => CacheTokenStorage::class,

    /**
     * The configuration for the providers.
     *
     * You may add additional keys and configuration objects here for
     * your own custom providers.
     */
    'provider_configuration' => [

        /**
         * The cache settings are only used if the
         * storage provider is set to CacheTokenStorage.
         */
        'cache' => [

            /**
             * The cache driver to use for storing tokens.
             * This should be set to the driver you want to use, such as 'file', 'redis', etc.
             *
             * If set to null, the default cache driver will be used.
             */
            'driver' => null,

            /**
             * The cache prefix to use for storing tokens.
             * This should be unique to avoid conflicts with other cached items.
             */
            'prefix' => 'visma.token',
        ],
    ],

];
