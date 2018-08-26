<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;


class Event extends BaseModel
{
    public $title;
    public $description;
    public $price;
    public $age;
    public $website;
    public $ticket_link;
    public $fyler;

    private $_pois = [];

    public function setPois(array $pois)
    {
        $this->_pois = $pois;
    }

    public function getPois()
    {
        return Poi::iterator($this->_pois);
    }
}