<?php  include __DIR__ . "/../baseOpen.html.php"; 

use App\Controller\PingController;

                        
require_once '../../src/Controller/PingController.php';

echo "<br><br><br><br>";


$uri = filter_input(INPUT_SERVER, "REDIRECT_URL");   
$uri = $_SERVER['REQUEST_URI'];  

var_dump ($uri);


echo "<HTML><BODY>";

echo '<table border=1 style="font-size: 10pt">';
echo '<tr>
    <td>Adresse Ip</td>
    <td>Etat</td>
    <td>Date du Ok</td>
    <td>Hostname</td>
    </tr>';

controller::ping();

echo "</table>";



echo "</BODY></HTML>";

?>