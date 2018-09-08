<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;


class Blog extends ActiveEndpoint
{
    public function getEndpointName()
    {
        return '{{%blogs}}';
    }
}