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
        return 'events';
    }
}