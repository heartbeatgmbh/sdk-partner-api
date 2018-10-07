<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;

/**
 * Stream Item Model.
 * 
 * A stream item can be a POI, Blog or Event, the getObject() methods hodls the model object
 * for the given type.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class StreamItem extends BaseModel
{
    /**
     * TYPE POI
     */
    const TYPE_POI = 'poi';

    /**
     * TYPE BLOG
     */
    const TYPE_BLOG = 'blog';

    /**
     * TYPE EVENT
     */
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