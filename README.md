# Heartbeat Parnter API SDK

## Installation

In order to you use to library composer is required.

```sh
composer require heartbeat/sdk-partner-api
```

## Usage

*Events*

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

*POIs*

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

$poi = \Heartbeat\Poi::find()->findOne(1337);

if (!$poi) {
    throw new \Exception("Unable to find the given POI id");
}

foreach ($poi->eventDates as $date) {
    echo $date->start_timestamp;
}
```