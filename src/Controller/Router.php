<?php

class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            //Chargement automatique des classes
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url ='';

            // Le controlleur est inclus selon l'action de l'utilisateur
            if(isset($_Get['url']))
            {
                $url = explode('/', filter_var($_GET['url'],
                FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "Controller/".controllerClass.".php";

                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                } else
                    throw new Exception('Page introuvable');
            }
            else 
            {
                require_once('Controller/ControllerAccueil.php');
                $this->_ctrl = new PingController('$url');
            }

        }
        //Gestion des erreurs
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            require_once('template/Error.php');
        }
    }
}