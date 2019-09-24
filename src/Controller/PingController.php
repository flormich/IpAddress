<?php

namespace App\Controller;

class PingController
{    
    private $essai = 'Je suis dans Controller/show';
    private static $pdo;

    public function show()
    {
        // $essai = "Je suis dans Controller/show";
        $Foo = "Quelque chose";

        // return $Foo;
        return self::$essai;
        // "JE suis dans Controller/show";
        // return $this->render("template/app/show.html.php", [
        //     "message" => "Hello world !!",
        //     "suite" => $Foo
        // ]);
    }

    public static function ping()
    {
        $now = date("d/m/Y H:i");
        for ($RESEAU = 0; $RESEAU <= 1; $RESEAU++)
        {            
            for ($IP = 1; $IP <= 255; $IP = $IP+1)
            {
                //Trouver le host du serveur suivant son ip
                $hostname = gethostbyaddr("192.168.$RESEAU.$IP");
                //Soummettre le ping (0 = machine joignable)
                exec("timeout 0.03 ping -c1 192.168.$RESEAU.$IP", $output, $Status); 
                {
                echo "<tr>";
                    if ($Status != 0){                        
                        echo "<td>192.168.$RESEAU.$IP</td>";
                        echo "<td><span style='background-color:#ff0000'>Ko</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                    } else {
                        echo "<td>192.168.$RESEAU.$IP</td>";
                        echo "<td><span style='background-color:#00ff00'>Ping Ok</span></td>";
                        echo "<td>$now</td>";
                        echo "<td>$hostname</td>";
                    }
                echo "</tr>";
                }
            }           
        } 
    }
}