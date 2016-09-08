<?php
namespace Aurora;

class Data{
    
    static function getJson($file,$asObject = FALSE){
        $array = json_decode(file_get_contents($file), TRUE);
        if($asObject)
            return (object) $array;
        else
            return $array;
    }
}