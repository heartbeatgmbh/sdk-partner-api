<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;

class EventDate extends ActiveEndpoint
{
    public $id;
    public $start_timestamp;
    public $end_timestamp;
    public $extra_text;
    public $origin;

    public function getEndpointName()
    {
        return '{{%events}}';
    }

    public function processContent(array $content)
    {
        return isset($content['items']) ? $content['items'] : $content;
    }

    private $_event;

    public function setEvent(array $event)
    {
        $this->_event = $event;
    }

    public function getEvent()
    {
        return new Event($this->_event);
    }
}