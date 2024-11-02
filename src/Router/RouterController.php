<?php
namespace vinic\portifolio2\Router;

abstract class RouterController
{
    public function render($view = null)
    {
        require_once "src/Views/".$view.".php";
    }

}