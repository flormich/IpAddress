<?php  include __DIR__ . "/../baseOpen.html.php"; 

use App\Controller\PingController;
use App\Controller\ControllerAddress;
use App\Controller\Controller;
use App\Database\PDOHandler;

use App\Http\Response;

require_once '../../src/Controller/PingController.php';
require_once '../../src/Controller/ControllerAddress.php';
require_once '../../src/Database/PDOHandler.php';
require_once '../../src/Controller/Controller.php';

require_once '../../src/Http/Response.php';


$response = new Response;
$createIp = new ControllerAddress($response);
$createIp->createIpAddress();

header('Location: ../../public');
exit();

?>

