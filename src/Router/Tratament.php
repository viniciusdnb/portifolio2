<?php

namespace vinic\portifolio2\Router;

class Tratament{

    protected string $url;

    public function __construct()
    {
        if(isset($_GET["url"]))
        {
            $strUrl = rtrim($_GET["url"], "/");

            $this->url = preg_replace("/[^a-zA-Z0-9\/,]/", "", $strUrl);

            return;
        }
        
        $this->url = false;
    }

   

    public function getUrl():string
    {
        return $this->url;
    }
}

