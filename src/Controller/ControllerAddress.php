<?php

namespace App\Controller;

use App\Model\IpAddress;
use App\Controller\Controller;
use App\Controller\PingController;

require_once 'Controller.php';

class ControllerAddress extends Controller
{
    public function displayIpAddress()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name  FROM IpAddress ORDER BY ip_Num';
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
        for ($RESEAU = 0; $RESEAU <= 1; $RESEAU++)
        {
            $IP = 0;
            while ($IP <= 255)
            {
                $host = 'host 192.168.$RESEAU.$IP';
                exec("timeout 0.025 ping -c1 192.168.$RESEAU.$IP", $output, $Status); 
                {
                    if ($Status == 0){   
                        $date = date("Y-m-d H:i");                        
                        $ipNum = ip2long("192.168.$RESEAU.$IP");                        

                        $sql = "INSERT INTO IpAddress VALUE ('', '192.168.$RESEAU.$IP', 'OK', '$date', '', $ipNum, '', '')";
                        $pdo = $this->getPdo();
                        $sth = $pdo->prepare($sql);
                        $sth->execute();
                
                        $response = $this->getResponse();
                        $response->setHeader([
                            "Location" => "Controller.php"
                        ]);                        
                        // return $response;
                    }
                    $IP++;
                }
            }
        }
    }
  
    // public function updateIpAddress()
    // {
    //     for ($RESEAU = 0; $RESEAU <= 0; $RESEAU++)
    //     {
    //         for ($IP = 0; $IP <=255; $IP++)
    //         {
    //             exec("timeout 0.025 ping -c1 192.168.$RESEAU.$IP", $output, $Status); 
    //             {
    //                 $date = date("Y-m-d H:i");

    //                 if ($Status == 0){    
    //                     $ipNum = ip2long("192.168.$RESEAU.$IP");                       
    //                     $sql = "INSERT INTO IpAddress VALUE ('', '192.168.$RESEAU.$IP', 'OK', '$date', '', '$ipNum', '', '') ON DUPLICATE KEY UPDATE status = 'OK', date_dern_on = '$date', date_ko = ''";
    //                     $pdo = $this->getPdo();
    //                     $sth = $pdo->prepare($sql);
    //                     $sth->execute();
                
    //                     $response = $this->getResponse();
    //                     $response->setHeader([
    //                         "Location" => "Controller.php"
    //                     ]);                                               
    //                     // return $response;
    //                 }  else  {   
    //                     $sql = "UPDATE IpAddress SET date_ko = '$date', status = 'Ko' WHERE ip = '192.168.$RESEAU.$IP'";
    //                     $pdo = $this->getPdo();
    //                     $sth = $pdo->prepare($sql);
    //                     $sth->execute();                            
    //                     $response = $this->getResponse();                                                    
    //                 }
    //             }
    //         }
    //         // header('Location: ../../public');
    //     }
    // }

    public function updateIpAddress()
    {
        for ($RESEAU = 0; $RESEAU <= 0; $RESEAU++)
        {
            for ($IP = 0; $IP <=255; $IP++)
            {
                exec("timeout 0.025 ping -c1 192.168.$RESEAU.$IP", $output, $Status); 
                {
                    $date = date("Y-m-d H:i");

                    if ($Status == 0){    
                        $ipNum = ip2long("192.168.$RESEAU.$IP");                       
                        $sql = "INSERT INTO IpAddress VALUE ('', '192.168.$RESEAU.$IP', 'OK', '$date', '', '$ipNum', '', '') ON DUPLICATE KEY UPDATE status = 'OK', date_dern_on = '$date', date_ko = ''";
                        $pdo = $this->getPdo();
                        $sth = $pdo->prepare($sql);
                        $sth->execute();
                
                        $response = $this->getResponse();
                        $response->setHeader([
                            "Location" => "Controller.php"
                        ]);                                               
                        // return $response;
                    }  else  {   
                        $sql = "UPDATE IpAddress SET date_ko = '$date', status = 'Ko' WHERE ip = '192.168.$RESEAU.$IP' AND status = 'OK' ";
                        $pdo = $this->getPdo();
                        $sth = $pdo->prepare($sql);
                        $sth->execute();                            
                        $response = $this->getResponse();                                                    
                    }
                }
            }
            // header('Location: ../../public');
        }
    }

    public function deleteIpAddressAll()
    {
        $sql = "DELETE FROM IpAddress";
        $pdo = $this->getPdo();
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $this->createIpAddress();
        
        $response = $this->getResponse();
        header('Location: ../../public');
        // $response->setHeader([
        //     "Location" => "Controller.php"
        //     ]);                        
    }

    public function deleteIpAddress($ip)
    {
        $sql = "DELETE FROM IpAddress WHERE IpAddress.ip =:ip";
        $sth = $this->getPdo()->prepare($sql);
        $sth->bindValue(":ip", $ip, \PDO::PARAM_INT);
        $sth->execute();
        $response = $this->getResponse();
        $response->setHeader([
            "Location" => "../../public"
        ]);
        return $response;
    }
}