# Heartbeat Parnter API SDK

Access the Heartbeat Content Hub Partner APIs with this easy to use PHP SDK.

[![Build Status](https://travis-ci.org/heartbeatgmbh/sdk-partner-api.svg?branch=master)](https://travis-ci.org/heartbeatgmbh/sdk-partner-api)
[![Latest Stable Version](https://poser.pugx.org/heartbeat/sdk-partner-api/v/stable)](https://packagist.org/packages/heartbeat/sdk-partner-api)
[![Total Downloads](https://poser.pugx.org/heartbeat/sdk-partner-api/downloads)](https://packagist.org/packages/heartbeat/sdk-partner-api)
[![License](https://poser.pugx.org/heartbeat/sdk-partner-api/license)](https://packagist.org/packages/heartbeat/sdk-partner-api)

## Installation

In order to you use to library composer is required.

```sh
composer require heartbeat/sdk-partner-api
```

## Usage

Examples how to use the Heartbeat SDK. For every request you need a valid Client object holding the Access Key.

### Events

Usage examples to get the latest events and display informations:

```php
// create the client object with the access token
$client = new \Heartbeat\Client('MY_ACCESS_TOKEN');

// foreach events and display related data including pois
foreach (\Hearbeat\EventDate::findAll($client) as $date) {

    // display the event date related informations
    echo $date->start_timestamp;
    echo $date->end_timestamp;

    // display the related event for this date:
    echo $date->event->title;
    echo $date->event->description;

    // as an event can have multiple pois iterator trough pois and display infos
    foreach ($date->event->pois as $poi) {
        echo $poi->title;
        echo $poi->street_combined;
        echo $poi->city;
        echo $poi->zip;
    }
}
```

### POIS

An example to collect pois

```php
// create the client object with the access token
$client = new \Heartbeat\Client('MY_ACCESS_TOKEN');

// foreach trough pois, limited by pages.
foreach (\Heartbeat\Poi::findAll($client) as $poi) {
    echo $poi->title;
    echo $poi->id;
}
```

Get all events and openinghours for a given POI id 1337:

```php
// create the client object with the access token
$client = new \Heartbeat\Client('MY_ACCESS_TOKEN');

$poi = \Heartbeat\Poi::find()->viewOne(1337);

if (!$poi) {
    throw new \Exception("Unable to find the given POI id");
}

foreach ($poi->eventDates as $date) {
    echo $date->start_timestamp;
}
```