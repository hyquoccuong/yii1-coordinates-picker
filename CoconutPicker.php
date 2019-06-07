<?php

/**
 * Widget to use coordinate picker jQuery plugin.
 * Author: Coconut
 */
class CoconutPicker extends CWidget
{
    /** @var CModel model */
    public $model;

    /* @var string $apiKey */
    public $apiKey;

    /** @var string latitude attribute name in $model */
    public $latitudeAttribute = 'latitude';

    /** @var string longitude attribute name in $model */
    public $longitudeAttribute = 'longitude';

    /** @var string latitude input id */
    public $latitudeInputId;

    /** @var string longitude input id */
    public $longitudeInputId;

    /** @var float Default latitude for picked coordinates, by default set to Kiev */
    public $defaultLatitude = 51.5287352;

    /** @var float Default longitude for picked coordinates, by default set to Kiev */
    public $defaultLongitude = -0.3817841;

    /** @var int Map zoom level */
    public $zoomLevel = 10;


    /** @var string Path to assets directory published in init() */
    private $assetsDir;


    /**
     *  Publish assets and generate input ids when they is not set
     */
    public function init()
    {
        $dir = dirname(__FILE__) . '/assets';
        $this->assetsDir = Yii::app()->assetManager->publish($dir);

        if (!isset($this->latitudeInputId)) {
            $this->latitudeInputId = CHtml::activeId($this->model, $this->latitudeAttribute);
        }
        if (!isset($this->longitudeInputId)) {
            $this->longitudeInputId = CHtml::activeId($this->model, $this->longitudeAttribute);
        }
    }

    /**
     *  Register required scripts and styles, render widget
     */
    public function run()
    {
        $cs = Yii::app()->getClientScript();

        /* $cs->registerCoreScript('jquery');*/
        //Assign server side value to script
        $cs->registerScript('prepareMapData', "
           var defaultLatitude = $this->defaultLatitude;
           var defaultLongitude = $this->defaultLongitude;
           var zoomLevel = $this->zoomLevel;
           var latitudeInputId = '$this->latitudeInputId';
           var longitudeInputId = '$this->longitudeInputId';
        ", CClientScript::POS_BEGIN);

        //Register js and css
        $cs->registerScriptFile("https://maps.googleapis.com/maps/api/js?key=" . $this->apiKey, CClientScript::POS_BEGIN);
        $cs->registerScriptFile($this->assetsDir . '/map.js', CClientScript::POS_END);
        $cs->registerCssFile($this->assetsDir . '/map.css');

        //Render map container div
        echo '<div id="map"></div>';
    }

}
