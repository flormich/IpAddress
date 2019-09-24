<?php

namespace App\Controller;
require_once 'PingController.php';

use App\Model\IpAddress;

class ControllerAddress extends Controller
{
    public function displayIpAddress()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT * FROM IpAddress';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function createIpAddress()
    {
        // if(!$this->isCsrfTokenValid())
        // { 
        //     throw new \UnexpectedValueException("Invalide token");
        // }
    
        $ip = 0;
        while ($ip < 5) {
            exec("ping -c1 192.168.0.$ip", $output, $status);
            if ($status != 0){
                $sql = "INSERT INTO IpAddress VALUES ('', 200 ,'','')";
                $sth = $this->getPdo()->prepare($sql);
                $sth->execute();
                $response = $this->getResponse();
                $response->setHeader([
                    "Location" => "../../template/app/index.html.php"
                ]);
                // return $response;
                var_dump ("OK");
            }
            $ip++;
        }
        
        var_dump ($status);
    }

    public function updateIpAdress()
    {
        
    }

    public function deleteIpAdress()
    {

    }

    // public function index(){
    //     // echo 'Oui';
    //     $this->render('../app/index.html.php');
    // }
}