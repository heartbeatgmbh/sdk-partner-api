<?php

namespace Heartbeat\Partner\Test;


use Heartbeat\Partner\Poi;
use Heartbeat\Partner\EventDate;
use Heartbeat\Partner\Stream;
use Heartbeat\Partner\Blog;
use Heartbeat\Partner\Rating;

class EndpointTest extends SdkPartnerApiTestCase
{
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

    public function testRatingsPost()
    {
        $rating = new Rating();
        $rating->rating = 10;
        $rating->poi_id = 516;
        $rating->user_client_language = 'de';
        $rating->addRatingAttribute(1, 1);
        $this->assertTrue($rating->save($this->getClient()));
    }
}