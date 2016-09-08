<?php

use Aurora;

//Enables the autoloading for the instanciation of classes.
require_once '../Framework/autoloader.php';

/*
 * Get the routing mapping, at the moment only exporting an JSON into Array.
 * The idea is to keep it flexible. to load it from JSON,DBs or elsewhere.
 */
$mapping = Aurora\Data::getJson("../htdocs/routeMap.json");

//Load the router associating the mapping array
$route = new Aurora\Router($mapping);

//Load the view class
$view = new Aurora\View();

//Set the attributes given through the URL to the view object.
$view->setAttributes($route->attributes);

//Mapping is given to be used in the template.
$view->get("defaultTemplate.php",$route->mapping);


exit;
