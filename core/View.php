<?php

namespace App;

class View
{
    public function render($filename, array $data)
    {
        extract($data);
        require_once __DIR__ . "/../views/" . $filename . ".php";
    }

}

