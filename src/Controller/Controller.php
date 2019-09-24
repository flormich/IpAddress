<?php

namespace App\Controller;

require_once 'ControllerInterface.php';

use App\Http\ResponseInterface;
use App\Database\PDOHandler;
use App\Model\Token;
use App\Http\Response;

class Controller implements ControllerInterface
{
    private $response;

    public function __construct(ResponseInterface $response)
    {
        
        $this->response = $response;
        
        // session_start();
        if(!array_key_exists("token", $_SESSION)){
            $token = new Token();
            $token->setIp(filter_input(INPUT_SERVER,"REMOTE_ADDR"));
            $token->setUserAgent(filter_input(INPUT_SERVER,"HTTP_USER_AGENT"));
            $token->setKey(md5(openssl_random_pseudo_bytes(32)));
            $_SESSION["token"] = $token;
        }
        $this->setSecureToken();       
    }

    public function render(string $path, array $data = []): ResponseInterface
    {
        $filename = __DIR__ . "/../../template/" . $path;
        if (!is_file($filename)){
            throw new RunTimeException('Template not found :' . $filename);
        }

        extract($data);
        ob_start();
        include $filename;
        $body = ob_get_clean();
        $this->response->setBody($body);
        return $this->response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    private function setSecureToken()
    {
  
    }

    protected function getToken(): Token
    {            
        return $_SESSION["token"];
    }

    protected function isCsrfTokenValid(): bool
    {            
        $token = $this->getToken();
        if ((string)$token !== $this->get("token")
        || $token->getIp() !== filter_input(INPUT_SERVER,"REMOTE_ADDR")
        || $token->getUserAgent() !== filter_input(INPUT_SERVER,"HTTP_USER_AGENT")) {
            return false;

        //ci-dessus au lieu de ce-dessous grace au point 1 de rolesCOntroller
        // $inputToken = filter_input(INPUT_GET,"token");
        // if (!$inputToken) {
        //     $inputToken = filter_input(INPUT_POST, "token");
        // }
        // if ((string) $token !== $inputToken
        //  || $this->getToken()->getIp() !== filter_input(INPUT_SERVER,"REMOTE_ADDR")
        //  || $this->getToken()->getUserAgent() !== filter_input(INPUT_SERVER,"HTTP_USER_AGENT")) {
        //     echo "Pas OK";
        //     return false;
        }
        return true;
    }

    protected static function getPdo(): \PDO
    {
        return PDOHandler::getPDO();
    }

    protected function get(string $variablName, string $regExp = null)
    {
        $options = null;
        $filterValidate = FILTER_DEFAULT;
        $inputType = array_key_exists($variablName, $_GET) ? INPUT_GET : INPUT_POST;
        if ($regExp) {
            $filterValidate = FILTER_VALIDATE_REGEXP; 
            $options = ["options" => ["regexp" => $regExp]];
        }
        return filter_input($inputType, $variablName, $filterValidate, $options);
    }
}