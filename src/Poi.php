<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;


class Poi extends ActiveEndpoint
{
    public $id;
    public $title;
    public $teaser_description;
    public $full_description;
    public $street;
    public $street_nr;
    public $street_combined;
    public $zip;
    public $city;
    public $cords_lng;
    public $cords_lat;
    public $is_temp_closed;
    public $logo;

    public function getEndpointName()
    {
        return '{{%pois}}';
    }

    public function processContent(array $content)
    {
        return isset($content['items']) ? $content['items'] : $content;
    }

    protected static function findEventDates($id)
    {
        return self::index()->setEndpoint('{endpointName}/{id}/events')->setTokens(['{id}' => $id]);
    }

    public function getEventDates(Client $client)
    {
        return EventDate::iterator(self::findEventDates($this->id)->response($client)->getContent());
    }
}