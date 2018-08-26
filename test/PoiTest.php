<?php

namespace Heartbeat\Partner\Test;

use PHPUnit\Framework\TestCase;
use Heartbeat\Partner\Client;
use Heartbeat\Partner\Poi;

class PoiTest extends TestCase
{
    public function testPois()
    {
        $client = new Client('');

        $poi = Poi::findOne(466, $client);

        foreach ($poi->getEventDates($client) as $date) {
            var_dump(date("d.m.y H:i", $date->start_timestamp));
            echo $date->event->title;
        }
    }
}