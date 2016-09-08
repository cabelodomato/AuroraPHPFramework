<?php

namespace Aurora;

class View {

    use Path;

    private $view;

    public function __construct($path = "../htdocs/") {
        $this->_path = $path;
    }

    public function setAttributes(array $attributes) {
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
    }

    public function get($file, array $attributes = NULL) {
        //Setting the attributes to a single/local view request.
        if (isset($attributes)) {
            extract($attributes);
        }
        //Parse and display the view
        // Possibility to include future plugins here. Such as a minify one.
        $fullPath = $this->getFullPath($file);
        ob_start();
        if (file_exists($fullPath)) {
            require $fullPath;
        } else {
            echo $fullPath . " does not exists (yet)!<br/>";
        }
        $this->view = ob_get_flush();
    }

}
