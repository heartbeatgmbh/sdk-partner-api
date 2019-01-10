<?php

namespace Heartbeat\Partner;

use luya\headless\Exception;
use luya\headless\ActiveEndpoint;
use luya\headless\Client;

/**
 * Streams Active Endpoint.
 * 
 * Expands:
 * + images (POI)
 * + image (Blog)
 * + virtualProperties (POI, Blog)
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Stream extends ActiveEndpoint
{
    public $id;
    public $title;
    public $alias;
    public $max_items;

    /**
     * {@inheritDoc}
     */
    public function getEndpointName()
    {
        return '{{%streams}}';
    }

    public static function find()
    {
        return parent::find()->setContentProcessor(function($content) {
            return isset($content['items']) ? $content['items'] : $content;
        });
    }

    public static function view($id)
    {
        throw new Exception("View is not supported for this Endpoint.");
    }

    public function items(Client $client)
    {
        return self::findItems($this->alias, $client);
    }

    public static function findItems($alias, Client $client)
    {
        return StreamItem::iterator(self::find()
            ->setEndpoint('{endpointName}/{alias}')
            ->setTokens(['{alias}' => $alias])
            ->response($client)
            ->getContent());
    }
}