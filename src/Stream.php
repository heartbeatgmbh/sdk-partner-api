<?php

namespace Heartbeat\Partner;

use luya\headless\ActiveEndpoint;

class Stream extends ActiveEndpoint
{
    public $id;
    public $title;
    public $alias;
    public $max_items;

    public function getEndpointName()
    {
        return '{{%streams}}';
    }

    private $_items = [];

    public function setItems(array $items)
    {
        $this->_items;
    }

    public function getItems()
    {
        return StreamItem::iterator($this->_items);
    }

    public function getObjects()
    {
        $objects = [];
        foreach ($this->getItems() as $item) {
            $objects[] = $item->object;
        }

        return $objects;
    }
}