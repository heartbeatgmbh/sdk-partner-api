<?php

namespace Heartbeat\Partner;

use luya\headless\Client as BaseClient;

/**
 * Request Client Object.
 * 
 * Holds the informations about how the client makes requests, url, language and token
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Client extends BaseClient
{
    /**
     * @var string Contains the url to the api.
     */
    public $serverUrl = 'https://api.heartbeat.gmbh';

    /**
     * @var string Endpoint prefix holds the current api version for partner client.
     */
    public $endpointPrefix = 'partnerV1/';

    /**
     * Constructor for new Client.
     *
     * @param string $accessToken
     * @param string $language
     */
    public function __construct($accessToken, $language = null)
    {
        $this->accessToken = $accessToken;
        $this->language = $language;   
    }

    /**
     * Allows you to override the server url with sandbox env.
     * 
     * ```php
     * $client = new Client('TOKEN');
     * $client->sandbox();
     * // ... do requests
     * ```
     */
    public function sandbox()
    {
        $this->serverUrl = 'https://sandbox.api.heartbeat.gmbh';
    }
}