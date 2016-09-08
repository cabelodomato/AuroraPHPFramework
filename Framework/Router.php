<?php

namespace Aurora;

class Router {

    public function __construct(array $routeMap) {
        //$this->method = $this->getMethod();
        //$this->requestedPath = $this->getRequestPath();
        $this->attributes = $this->getAttributes();
        $this->mapping = $this->getParseMap($routeMap);
    }
    
    private function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getRequestPath() {
        $request = $_SERVER['REQUEST_URI'];
        if (stripos($request, "?")) {
            $array = explode("/", strstr($request, "?", TRUE));
        } else {
            $array = explode("/", $request, 4);
        }
        array_shift($array); //Disposing the null element at that comes at the begining of the array.
        return $array;
    }

    private function getAttributes() {
        parse_str($_SERVER['QUERY_STRING'], $array);
        return $array;
    }

    private function getParseMap(array $map){
        if(isset($map[$this->getMethod()])){
            return $this->getParseMapGivenMethod($map[$this->getMethod()],  $this->getRequestPath());            
        }
    }

    private function getParseMapGivenMethod(array $map,array $requestedPath) {
        $keyword = array_shift($requestedPath); // Get the first level keyword
        $route = [];
        
        if($keyword=="static"){
            echo "static!";
            $route += ["page" =>"static/".implode("/", $requestedPath)];
            return $route;
        }        
        
        if (isset($map[$keyword])) { // If keyword is found on the first level of array.
            $route = $this->getParseMapGivenMethod($map[$keyword],$requestedPath);
        }
        
        foreach ($map as $key => $value) { //Go through each array value.
            if (is_string($value)) { //Check if the array value is a string (Not an array/object).
                $route += [$key => $value]; //Adds the key and value to the associative array.
            }
        }
        return $route;
    }

}
