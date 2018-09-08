<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;

class StreamItem extends BaseModel
{

    const TYPE_POI = 'poi';
    const TYPE_BLOG = 'blog';
    const TYPE_EVENT = 'event';

    
    public $id;
    public $stream_id;
    public $sort_index;
    public $type;
    public $pk_id;

    private $_object;

    public function setObject($object)
    {
        $this->_object = $object;
    }

    public function getObject()
    {
        switch ($this->type) {
            case self::TYPE_BLOG:
                return new Blog($this->_object);
            case self::TYPE_POI:
                return new Poi($this->_object);
            case self::TYPE_EVENT:
                return new Event($this->_object);
        }
    }
}