<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;

/**
 * Event Date Active Endpoint.
 * 
 * Contains the Event Date informations.
 * 
 * The meta informations about events are stored in Event.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class EventDate extends ActiveEndpoint
{
    public $id;
    public $start_timestamp;
    public $end_timestamp;
    public $extra_text;
    public $origin;

    /**
     * {@inheritDoc}
     */
    public function getEndpointName()
    {
        return '{{%events}}';
    }

    public static function find()
    {
        return parent::find()->setContentProcessor(function($content) {
            return isset($content['items']) ? $content['items'] : $content;
        });
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