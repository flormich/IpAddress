<?php
     include __DIR__ . "/../baseOpen.html.php";

     $ipBdd = array ();
     foreach ($ipAddresses as $ipAddress) {
     $ipBdd[] = [
          'ip' => $ipAddress->getIp(),
          'status' => $ipAddress->getStatus(),
          'type' => $ipAddress->getTypeMat(),
          'name' => $ipAddress->getName(),
     ];
     }

     $date = $ipAddress->getDateDernOn();
     echo $date;

     $ipFreeArray = array ();
     $ip = 0 ;
     for ($ip = 0; $ip<256; $ip++) {
          $ipFreeArray[] = [
               'ip' => $ipFree = "192.168.0.$ip",
          ];
     }
?>

<br>


<?php include "../config/variable.php"; ?>


<!-- Display data -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     
     
     ?> 
     <table class="borderIpKoNoNormal"> 
          <u><h4>
             Adresses <b style="color:red">Ip Ko</b> � surveiller
          </h4></u>
          <?php 
     
          for ($o = 1; $o<=$NbrIp; $o++)
          {
               if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
               {                         
                    ?> 
                    <?php if ($m == $o ){
                    ?> </tr><tr> <?php
                         $m += $NbrColonne;
                    } else {
                    }
                    if ($ipBdd[$i]['status'] == "Ko" && (($ipBdd[$i]['type'] == 'SRV') || ($ipBdd[$i]['type'] == 'BOX') || ($ipBdd[$i]['type'] == 'Imprimante') || ($ipBdd[$i]['type'] == 'Surveillance'))) {?>
                         <td class="borderBusyIp bckgroundKo" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                              <b style="color:GreenYellow">
                                   <?php
                                        echo ($ipBdd[$i]['ip']) . "<br";
                                   ?>
                              </b>
                              <b style="color:Gold ">
                                   <?php
                                        echo ($ipBdd[$i]['name']) . "<br>";
                                   ?>
                              </b>
                              <b style="color:GreenYellow">
                                   <?php
                                        echo ($ipBdd[$i]['type']);
                                   ?>
                              </b>
                         <?php
                    }
                    ?>
                    </td>
                    <?php
                    $i++;
               }                          
          }
     ?> 
     </table>
</div>

<br><hr>

<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     

     ?> 
     <table class="borderSpacer" style="margin:auto"> 
          <b><u><h4>
               Totalit� des adresses <b style="color:blue">Ip</b>
          </h4></u></b>
          <?php
               for ($o = 1; $o<=$NbrIp; $o++)
               {
                    if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
                    {                         
                         ?> 
                         <?php if ($m == $o ){
                         ?> </tr><tr> <?php
                              $m += $NbrColonne;
                         } else {
                         }

                         if ($ipBdd[$i]['status'] == "OK") {?>
                              <td class="borderBusyIp bckgroundOk" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip']?>'" >
                                   <b style="color:red">
                                        <?php
                                             echo ($ipBdd[$i]['ip']) . "<br>";
                                        ?>
                                   </b>
                                   <b class="colorBlue">
                                        <?php
                                             echo ($ipBdd[$i]['name']) . "<br>";
                                        ?>
                                   </b>
                              <?php
                         }
                         else if ($ipBdd[$i]['status'] == "Ko" && (($ipBdd[$i]['type'] == 'SRV') || ($ipBdd[$i]['type'] == 'BOX') || ($ipBdd[$i]['type'] == 'Imprimante') || ($ipBdd[$i]['type'] == 'Surveillance'))) {?>
                              <td class="borderBusyIp bckgroundKo" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                                   <b style="color:GreenYellow">
                                        <?php
                                             echo ($ipBdd[$i]['ip']) . "<br";
                                        ?>
                                   </b>
                                   <b style="color:Gold">
                                        <?php
                                             echo ($ipBdd[$i]['name']) . "<br>";
                                        ?>
                                   </b>
                              <?php
                         }
                         else if ($ipBdd[$i]['status'] == "NOK" ) {?>
                              <td class="borderBusyIp" style="background:#66BBFF" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                                   <b style="color:#5A5A5A">
                                        <?php
                                             echo ($ipBdd[$i]['ip']) . "<br";
                                        ?>
                                   </b>
                                   <b style="color:Purple">
                                        <?php
                                             echo ($ipBdd[$i]['name']) . "<br>";
                                        ?>
                                   </b>
                              <?php
                         }
                         else { ?>
                              <td class="borderBusyIp bckgroundKoNormal " onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                                   <b style="color:red">
                                        <?php
                                             echo ($ipBdd[$i]['ip']) . "<br>";
                                        ?>
                                   </b>
                                   <b class="colorBlue">
                                        <?php
                                             echo ($ipBdd[$i]['name']) . "<br>";
                                        ?>
                                   </b>
                              <?php
                         }
                              ?>
                                   <b>
                                        <?php
                                             echo ($ipBdd[$i]['type']);
                                        ?>
                                   </b>
                              </td>
                         <?php
                         $i++;
                    } else {     
                         if ($m == $o ){
                              ?> </tr><tr> <?php
                              $m += $NbrColonne;
                         } else {
                         }
                         ?>
                         <td class="borderFreeIp FreeTile">
                              <b class="colorTextAddIp">
                                   <?php
                                        echo "192.168.0.$o" . "<br>";
                                   ?>  
                              </b>                                 
                         </td>
                    <?php
                    }                           
               }
          ?> 
     </table>
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>