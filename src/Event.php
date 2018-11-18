<?php

namespace Heartbeat\Partner;

use luya\headless\base\BaseModel;

/**
 * Event Model.
 * 
 * The event object contains the meta informations about an event, date informations (as events
 * can have multiple dates) are stored in EventDate model.
 * 
 * Therefore data is retrieved from API trough EventDate.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Event extends BaseModel
{
    public $title;
    public $description;
    public $price;
    public $age;
    public $website;
    public $ticket_link;
    public $flyer;

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
