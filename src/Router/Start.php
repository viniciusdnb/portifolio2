<?php

namespace vinic\portifolio2\Router;

use Exception;
use vinic\portifolio2\Router\Url;
use vinic\portifolio2\Router\VerifyActionController;
use vinic\portifolio2\Router\VerifyController;

class Start {
    
    private $objUrl;
    public $objController;
    private $action;
    private $params;
    private $nameController;

    public function __construct()
    {
        $this->objUrl = new Url;
        $this->nameController = $this->objUrl->getControllName(); 
        $this->action = $this->objUrl->getActionName();
        $this->params = $this->objUrl->getParams();
        $this->start();
    }

    public function start():void
    {
        $this->defineConstantes();
        if(isset($this->nameController))
        {
            $this->startObjController($this->nameController);            
            new VerifyActionController($this->objController,$this->action,$this->params);
            return;
        }

        throw new Exception("erro desconecido", 500);
    }
        

    function startObjController(string $nameController):void
    {
       $controller = new VerifyController($nameController);
       $this->objController = new $controller->class;
    }

    function defineConstantes()
    {
        
       
        
        if($_SERVER["SERVER_NAME"] === "localhost")
       { 
        define("LINK", "http://localhost/portifolio2/");
        define("DB_PRODUCAO", "DB"); 
       }
       /*if($_SERVER["SERVER_NAME"] === "viniciusdev.top")
       {
        define("LINK", "https://viniciusdev.top/");
        define("DB_PRODUCAO", "DBprod"); 
       }*/
    }
}