<?php

namespace App\Controller;

// use EvTimer;
use App\Model\IpAddress;
use App\Controller\Controller;
use App\Controller\PingController;

require_once 'Controller.php';

class ControllerAddress extends Controller
{
    //Show Ip Address
    public function displayIpAddress()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);

        foreach($ipAddresses as $ipAddress) {
            $date = $ipAddress->getDateDernOn();
        }
        $_SESSION['date'] = "$date";

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function displayIpAddressComputer()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "PC" OR type_mat = "MAC" ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressSrv()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "SRV" ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressLabel()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "Etiquette" ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressPrinter()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "Imprimante" OR type_mat = "Scanner" ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressOversight()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "Surveillance" ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressOther()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE type_mat = "" OR type_mat IS NULL OR (type_mat != "PC" AND type_mat != "MAC" AND type_mat != "SRV" AND type_mat != "Imprimante" AND type_mat != "Scanner" AND type_mat != "Etiquette" AND type_mat != "Surveillance") ORDER BY ip_Num';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressOK()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE status = "OK" ORDER BY ip_num ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressKo()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE status = "Ko" ORDER BY ip_num ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayIpAddressKoDateKo()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE status = "Ko" ORDER BY date_ko ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses = $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
        
        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
        ]);
    }

    public function displayOneIpAddress($ip)
    {
        $pdo = $this->getPdo();
        $sql = "SELECT id, ip_Num, ip, status, date_dern_on, date_ko, name, type_mat  FROM IpAddress WHERE ip='$ip'";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/updateOneIp.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);        
    }

    public function displayIpAddressByDateKo()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress WHERE status = "Ko" ORDER BY date_ko ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function displayIpAddressByName()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress ORDER BY name ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function displayIpAddressByTypeMat()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress ORDER BY type_mat ASC';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function displayLastAddIpAddress()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT id, ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress ORDER BY id DESC LIMIT 10';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/index.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function displaySearchIpAddress()
    {
        $ip = $_POST['name'];
        $pdo = $this->getPdo();
        $sql = "SELECT id, ip_Num, ip, status, date_dern_on, date_ko, name, type_mat  FROM IpAddress WHERE ip='$ip'";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/resultSearch.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);        
    }

    public function displaySearchIpAddressIp($ip)
    {
        $pdo = $this->getPdo();
        $sql = "SELECT id, ip_Num, ip, status, date_dern_on, date_ko, name, type_mat  FROM IpAddress WHERE ip='$ip'";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);        

        return $this->render("app/resultSearch.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);        
    }


    //Create IpAddress
    public function createIpAddress()
    {
        for ($RESEAU = 0; $RESEAU <= 1; $RESEAU++)
        {
            $IP = 1;
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



    //Update IpAddress
    public function updateIpAddress()
    {
        for ($RESEAU = 0; $RESEAU <= 0; $RESEAU++)
        {
            for ($IP = 1; $IP <=255; $IP++)
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
        }
       
        //pour mettre dans une session la date et l'heure de la mise à jour que je récupérer dans baseOpen.html.php
        {
            $pdo = $this->getPdo();
            $sql = 'SELECT ip, status, date_dern_on, date_ko, type_mat, name FROM IpAddress ORDER BY ip_Num';
            $sth = $pdo->prepare($sql);
            $sth->execute();
            $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class);
    
            foreach($ipAddresses as $ipAddress) {
                $date = $ipAddress->getDateDernOn();
            }
            $_SESSION['date'] = "$date";
        }
        header('Location: ../../public/index.php/freeIp');
    }

    public function updateOneIpAddress()
    {
        $ip = $_POST["ip"];
        $status = $_POST["status"];
        $dateDernOn = $_POST["dateDernOn"];
        $dateKo = $_POST["dateKo"];
        $name = $_POST["name"];
        $typeMat = $_POST["typeMat"];

        $sql = "UPDATE IpAddress SET status = '$status', date_dern_on = '$dateDernOn', date_ko = '$dateKo', name = '$name', type_mat = '$typeMat' WHERE ip = '$ip' ";
        $pdo = $this->getPdo();
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $response = $this->getResponse();        


        // return $this->render("app/updateOneIp.html.php", [
        //     "ipAddresses" => $ipAddresses,
        //     // "token" => $this->isCsrfTokenValid(),
        // ]);  
        header('Location: /public/');
    }

    public function freeIpAddress() {

        $pdo = $this->getPdo();
        $sql = "SELECT ip, status, type_mat, name FROM IpAddress ORDER BY ip_Num ";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class); 

        return $this->render("app/freeIp.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    public function freeIpAddressByCat() {

        $pdo = $this->getPdo();
        $sql = "SELECT ip, status, type_mat, name FROM IpAddress ORDER BY ip_Num ";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $ipAddresses =  $sth->fetchAll(\PDO::FETCH_CLASS, IpAddress::class); 

        return $this->render("app/freeIpByCat.html.php", [
            "ipAddresses" => $ipAddresses,
            // "token" => $this->isCsrfTokenValid(),
        ]);
    }

    //Delete IpAddress
    public function deleteIpAddressAll()
    {
        $sql = "DELETE FROM IpAddress";
        $pdo = $this->getPdo();
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $this->createIpAddress();
        
        $response = $this->getResponse();
        header('Location: ../../public');                      
    }

    public function deleteIpAddress($ip)
    {
        $sql = "DELETE FROM IpAddress WHERE ip='$ip'";
        $pdo = $this->getPdo();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(":ip", $ip, \PDO::PARAM_INT);
        $sth->execute();
        
        $response = $this->getResponse();
        header('Location: ../../');
    }
}