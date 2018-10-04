<?php

namespace Heartbeat\Partner\Test;

use PHPUnit\Framework\TestCase;
use Heartbeat\Partner\Client;
use Heartbeat\Partner\Poi;
use Heartbeat\Partner\EventDate;
use Heartbeat\Partner\Stream;

class EndpointTest extends TestCase
{
    private function getClient()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->safeLoad();

        return new Client(getenv('token'));
    }

    public function testPoiAndPoiEvents()
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

    public function testStreams ()
    {
        $streams = Stream::findAll($this->getClient());


        foreach ($streams->getModels() as $stream) {
            $this->assertNotNull($stream->title);
            $this->assertNotNull($stream->alias);

            $streamItem = $stream->items($this->getClient());
            foreach ($streamItem as $item) {
                $this->assertNotNull($item->id);
                $this->assertNotNUll($item->object);
            }
        }
    }
}