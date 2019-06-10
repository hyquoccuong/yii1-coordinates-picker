# Coordinates Picker for Yii 1.1

jQuery Plugin to input coordinates in Yii application.

## Installation
Download or clone this repository and paste in `/protected/extensions/coconutPicker`

## Example:
```php
    ...
    $this->widget('ext..coconutPicker.CoconutPicker', array(
            'model' => $model,
            'apiKey' => 'Your google map api key',
            'latitudeAttribute' => 'latitude', //latitude field to pass value from picker
            'longitudeAttribute' => 'longitude', //latitude field to pass value from picker
            //optional settings
            'zoomLevel' => 12, //default zoom level on map
            'defaultLatitude' => 21.0227, //default latitude when initial
            'defaultLongitude' => 105.852, //default longitude when initial
            //'defaultLatitude' => !$model->isNewRecord ? $model->latitude : 51.5287352, //default latitude, loaded from model if in update form
            //'defaultLongitude' => !$model->isNewRecord ? $model->longitude : -0.3817841, //default longitude, loaded from model if in update form
    ));
    ...
```
