<?php

namespace Heartbeat\Partner;

use luya\headless\Client as BaseClient;

class Client extends BaseClient
{
    public $serverUrl = 'https://api.heartbeat.gmbh';

    public $endpointPrefix = 'partnerV1/';

    public function __construct($accessToken, $language = null)
    {
        $this->accessToken = $accessToken;
        $this->language = $language;   
    }
}