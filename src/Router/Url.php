<?php

namespace vinic\portifolio2\Router;

use vinic\portifolio2\Router\Tratament;

class Url
{
    private  $url;
    private array $arrayUrl;
    private  $controllName;
    private  $actionName;
    private  $params;

    function __construct()
    {
        $this->url = new Tratament();
        $this->explodeUrl();
    }

    private function explodeUrl()
    {
        if($this->url->getUrl())
        {
            $this->arrayUrl = explode("/", $this->url->getUrl());            
            $this->setVars();
            
        }else{
            $this->controllName = "home";
            
        }

    }
    private function setVars():void
    {
        
        $this->controllName = filter_var($this->verifyArray($this->getArrayUrl(),0), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->actionName = filter_var($this->verifyArray($this->getArrayUrl(),1), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->params = filter_var($this->verifyArray($this->getArrayUrl(),2), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
    }

    public function verifyArray(array $array, int $key)
    {
        if(isset($array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }

        return null;
    }

    public function getArrayUrl(){
        return $this->arrayUrl;
    }
    public function getControllName(){
        return $this->controllName;
    }
    public function getActionName(){
        return $this->actionName;
    }
    public function getParams(){
        return $this->params;
    }
    
}