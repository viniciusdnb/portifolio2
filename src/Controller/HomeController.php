<?php

namespace vinic\portifolio2\Controller;

use vinic\portifolio2\Router\RouterController;

class HomeController extends RouterController
{
    public function index(){
        $this->render("home/index");
    }

}