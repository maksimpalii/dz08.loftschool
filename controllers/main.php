<?php

namespace App;

class Main extends MainController
{
    public function index()
    {
        $data = [];
        $this->view->render('main', $data);
    }
}
