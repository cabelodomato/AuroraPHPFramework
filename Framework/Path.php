<?php
namespace Aurora;

Trait Path{
    private $_path;
    
    public function setViewPath($_path){
        $this->_path = $_path;
    }
    public function getViewPath(){
        return $this->_path;
    }
    protected function getFullPath($file){
        return $this->_path . $file;
    }
}