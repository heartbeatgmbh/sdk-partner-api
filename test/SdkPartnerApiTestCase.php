<?php

namespace Heartbeat\Partner\Test;

use Heartbeat\Partner\Client;
use PHPUnit\Framework\TestCase;

class SdkPartnerApiTestCase extends TestCase
{
    protected function getClient()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->safeLoad();

        $client = new Client(getenv('token'));
        $client->sandbox();
        return $client;
    }
}