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

     if (empty($ipBdd)) {
     ?><b style = "height:450px"><h3><center><b style="color:red">Aucune </b>donnée dans la BDD</center></h3></b><?php
     } else {
          $date = $ipAddress->getDateDernOn();
          echo $date;
     }

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






<!-- Display data IpKoSurv -->
<?php if (!empty($ipBdd)) {  ?>
     <div class="borderSpacer" style="text-align:center">
          <a id="haut"></a>
          <a id="red"></a>

          <?php
          $i = 0;
          $m = 1;
          $t = 1;
          
          $numberIpKoSurv = 0;
          ?>

          <table class="borderIpKoNoNormal"> 
               <h4>
                    <u> Adresses <b style="color:red"> Ip Ping Ko</b> A surveiller</u>
               </h4>
               <?php 
               
               for ($o = 0; $o<=$NbrIp; $o++)
               {
                    if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
                    {
                         if ($m == $t ){
                         ?> </tr><tr> <?php
                              $m += $NbrColonne;
                              $t++;
                         } else {
                              $t++;
                         }
                         if ($ipBdd[$i]['status'] == "Ko" && (($ipBdd[$i]['type'] == 'SRV') || ($ipBdd[$i]['type'] == 'BOX') || ($ipBdd[$i]['type'] == 'Imprimante') || ($ipBdd[$i]['type'] == 'Surveillance'))) 
                         {
                              ?>
                              <td class="borderBusyIp bckgroundKo" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                                   <b style="color:GreenYellow">
                                        <a href="/public/index.php/edit/<?= $ipBdd[$i]['ip']?>"> <img class="icoLeft" style="width:17%" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipBdd[$i]['ip']?>" ></a>                                      
                                        <?php echo ($ipBdd[$i]['ip']) ?>
                                        <a href="/public/index.php/delete/<?= $ipBdd[$i]['ip']?>"> <img class="icoDroit" style="width:17%" src="/assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipBdd[$i]['ip'];?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\' adresse de : <?= $ipBdd[$i]['name'] . " soit l\' IP N° : " . $ipBdd[$i]['ip'] ?> ?')"></a>
                                   </b>
                                   <?php echo "<br>"; ?>
                                   <b style="color:Gold ">
                                        <?php echo ($ipBdd[$i]['name']) . "<br>"; ?>
                                   </b>
                                   <b style="color:GreenYellow">
                                        <?php echo ($ipBdd[$i]['type']); ?>
                                   </b>
                              </td>
                              <?php
                              $numberIpKoSurv++;
                         } else {
                              $t--;
                         }
                         $i++;
                    }
               }
               ?> <i><b style="color:red; font-size:2em"> <?php
               echo $numberIpKoSurv;
               $NbrIpParCat = $NbrIpParCat + $numberIpKoSurv;
               ?> 
          </b></i>
          </tr></table>
     </div>

     <br><hr>

     <div class="borderSpacer" style="text-align:center">
          <?php
          $i = 0;
          $m = 0;     

          ?> 
          <table class="borderSpacer" style="margin:auto"> 
               <b><u><h4>Totalité des adresses <b style="color:blue">Ip</b></h4></u></b>
               <?php
                    for ($o = 0; $o<=$NbrIp; $o++)
                    {
                         if (empty($ipBdd)) 
                         {

                         } else if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
                         {                         
                              if ($m == $o ){
                              ?> </tr><tr> <?php
                                   $m += $NbrColonne;
                              } else {
                              }
                              if ($ipBdd[$i]['status'] == "OK") 
                              {
                                   ?>
                                   <td class="borderBusyIp bckgroundOk" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip']?>'" >
                                        <b style="color:red">
                                             <a href="/public/index.php/edit/<?= $ipBdd[$i]['ip']?>"> <img class="icoLeft" style="width:18%" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipBdd[$i]['ip']?>" ></a>
                                             <?php echo ($ipBdd[$i]['ip']); ?>
                                        </b>
                                             <?php echo "<br>"; ?>
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
                                             <a href="/public/index.php/edit/<?= $ipBdd[$i]['ip']?>"> <img class="icoLeft" style="width:18%" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipBdd[$i]['ip']?>" ></a>                                      
                                             <?php
                                                  echo ($ipBdd[$i]['ip']);
                                                  ?>
                                                  <a href="/public/index.php/delete/<?= $ipBdd[$i]['ip']?>"> <img class="icoDroit" style="width:18%" src="/assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipBdd[$i]['ip'];?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\' adresse de : <?= $ipBdd[$i]['name'] . " soit l\' IP N° : " . $ipBdd[$i]['ip'] ?> ?')"></a>
                                                  <?php echo "<br>"; ?>
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
                                             <a href="/public/index.php/edit/<?= $ipBdd[$i]['ip']?>"> <img class="icoleft" style="width:18%" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipBdd[$i]['ip']?>" ></a>
                                             <?php
                                                  echo ($ipBdd[$i]['ip']);
                                             ?>
                                             <a href="/public/index.php/delete/<?= $ipBdd[$i]['ip']?>"> <img class="icoDroit" style="width:18%" src="/assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipBdd[$i]['ip'];?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\' adresse de : <?= $ipBdd[$i]['name'] . " soit l\' IP N° : " . $ipBdd[$i]['ip'] ?> ?')"></a>
                                             <?php echo "<br>"; ?>
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
     <?php } ?>
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>