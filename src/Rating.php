<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;


class Rating extends ActiveEndpoint
{
    public $rating;
    public $poi_id;
    public $user_client_language;
    public $ratingAttributes = [];
    
    public function getEndpointName()
    {
        return '{{%ratings}}';
    }

    public function addRatingAttribute($id, $value)
    {
        $this->ratingAttributes[] = ['attribute_id' => $id, 'value' => $value];
    }
}