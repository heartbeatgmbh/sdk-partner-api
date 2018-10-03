<?php

namespace Heartbeat\Partner\Test;

use PHPUnit\Framework\TestCase;
use Heartbeat\Partner\Client;
use Heartbeat\Partner\Poi;
use Heartbeat\Partner\EventDate;

class PoiTest extends TestCase
{
    private function getClient()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->safeLoad();

        return new Client(getenv('token'));
    }

    public function testPois()
    {
        $poi = Poi::viewOne(466, $this->getClient());
        $this->assertNotNull($poi);
        foreach ($poi->getEventDates($this->getClient()) as $date) {
            $this->assertNotNull($date->event->title);
        }
    }

    public function testEvents()
    {
        $events = EventDate::findAll($this->getClient());
        
        $this->assertInstanceOf('luya\headless\base\BaseIterator', $events->getModels());
        foreach ($events->getModels() as $item) {
            $this->assertInstanceOf('Heartbeat\Partner\EventDate', $item);
        }
    }
}