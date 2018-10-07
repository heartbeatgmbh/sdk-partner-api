<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;

/**
 * Rating Active Endpoint.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
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