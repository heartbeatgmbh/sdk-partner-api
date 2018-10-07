<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;

/**
 * Blog Model.
 * 
 * Current only supported for given stream blog items. Therefore the blogs doe not have Partner APIs.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Blog extends BaseModel
{
    public $id;
    public $identifier;
    public $status;
    public $title;
    public $teaser;
    public $text;
    public $text_json;
    public $publish_timestamp;
    public $sponsored_text;

    public function getEndpointName()
    {
        return '{{%blogs}}';
    }
}