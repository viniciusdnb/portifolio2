<?php

namespace vinic\portifolio2\Router;

use Exception;

class VerifyController
{
    public $class;

    function __construct(string $nameController)
    {
        $nameClassController = ucfirst($nameController)."Controller";
        $controllerFile = $nameClassController.".php";

        if(file_exists("src/Controller/".$controllerFile))
        {
           if(class_exists("\\vinic\\portifolio2\\Controller\\". $nameClassController))
           {
                $nameClassController = "\\vinic\\portifolio2\\Controller\\". $nameClassController;
                $this->class = $nameClassController;
               
           }else{
            throw new Exception("Pagina não encontrada Erro.: Desculpe a Classe nao foi implementada", 501);
           }
        }else{
            throw new Exception("Pagina nao encontrada Erro:. Desculpe o Arquivo não Existe", 404);
        }
    }

}