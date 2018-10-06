<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;


class Blog extends BaseModel
{
    public function getEndpointName()
    {
        return '{{%blogs}}';
    }
}