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
     for ($ip = 0; $ip<255; $ip++) {
          $ipFreeArray[] = [
               'ip' => $ipFree = "192.168.0.$ip",
          ];
     }
?>

<br>

<!-- Display data -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i =0;
     $m = 0;
     $NbrColonne = 11;
     ?> 
     <!-- <table style="margin:auto">  -->
     <table class="borderSpacer" style="margin:auto"> <?php
          for ($o = 0; $o<255; $o++)
          {
               if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
               {                         
                    ?> 
                    <?php if ($m == $o ){
                    ?> </tr><tr> <?php
                         $m += $NbrColonne;
                    } else {
                    }
                    ?>
                         <?php if ($ipBdd[$i]['status'] == "OK") {?>
                              <td class="border bckgroundOk" onclick="document.location='/public/index.php/edit/<?= $ipBdd[$i]['ip']?>'" >
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
                              <td class="border bckgroundKo" onclick="document.location='/public/index.php/edit/<?= $ipBdd[$i]['ip'] ?>'">
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
                              <?php
                         }
                         else { ?>
                              <td class="border bckgroundKoNormal " onclick="document.location='/public/index.php/edit/<?= $ipBdd[$i]['ip'] ?>'">
                              <b style="color:red">
                              <?php
                                        echo ($ipBdd[$i]['ip']) . "<br>";
                                   ?></b>
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
                         <td class="border FreeTile">
                              <b class="colorTextAddIp">
                              <br>
                                   <?php
                                        echo "192.168.0.$o" . "<br>";
                                   ?>                    
                              
                         </td>
                    <?php
               }                           
          }
     ?> </table>
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>