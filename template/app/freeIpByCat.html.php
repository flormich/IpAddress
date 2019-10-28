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

<!-- Display data IpKoSurv -->
<div class="borderSpacer" style="text-align:center">
     <a id="haut"></a>

     <?php
     $i = 0;
     $m = 1;
     $t = 1;
         
     $numberIpKoSurv = 0; 
     ?>

     <table class="borderIpKoNoNormal"> 
          <u><h4>
             Adresses <b style="color:red"> Ip Ko</b> � surveiller
               <a href="#info"><img src="../../assets/img/Info.png" alt="Infos" title="Informations" style="width:2.5rem;"></a>
          </h4></u>
          <?php 
     
          for ($o = 0; $o<=$NbrIp; $o++)
          {
               if ($ipBdd[$i]["ip"] == $ipFreeArray[$o]["ip"])
               {
                    ?> 
                    <?php if ($m == $t ){
                    ?> </tr><tr> <?php
                         $m += $NbrColonne;
                         $t++;
                    } else {
                         $t++;
                    }
                    if ($ipBdd[$i]['status'] == "Ko" && (($ipBdd[$i]['type'] == 'SRV') || ($ipBdd[$i]['type'] == 'BOX') || ($ipBdd[$i]['type'] == 'Imprimante') || ($ipBdd[$i]['type'] == 'Surveillance'))) {
                         ?>
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
                         </td>
                         <?php
                         $numberIpKoSurv++;
                    } else {
                         $t++;
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

<!-- Display data PingIpNeVoisPas -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     $t = 1;
         
     $numberIpKoNotView = 0; 
     ?>

     <table class="borderIpKoNoNormal"> 
          <u><h4>
             Adresses <b style="color:#66BBFF"> Ip OK/Ko</b> ne marchant pas avec ping
             <a href="#info"><img src="../../assets/img/Info.png" alt="Infos" title="Informations" style="width:2.5rem;"></a>
          </h4></u>
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
                    if ($ipBdd[$i]['status'] == "NOK") {
                         ?>
                         <td class="borderBusyIp" style="background:#66BBFF" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                              <b style="color:#5A5A5A">
                                   <?php
                                        echo ($ipBdd[$i]['ip']) . "<br";
                                   ?>
                              </b>
                              <b style="color:Purple ">
                                   <?php
                                        echo ($ipBdd[$i]['name']) . "<br>";
                                   ?>
                              </b>
                              <b style="color:yellow">
                                   <?php
                                        echo ($ipBdd[$i]['type']);
                                   ?>
                              </b>
                         </td>
                         <?php
                         $numberIpKoNotView++;
                    } else {
                         $t--;
                    }
                    $i++;
               }
          }
          ?> <i><b style="color:#66BBFF; font-size:2em"> <?php
          echo $numberIpKoNotView;
          $NbrIpParCat = $NbrIpParCat + $numberIpKoNotView;
     ?> 
     </b></i>
     </tr></table>
</div>

<br><hr>


<!-- Display dataIpKoNormal -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     $t = 1;
        
     $numberIpKoN = 0;  
     ?>

     <table class="borderIpKoNoNormal"> 
          <u><h4>
             Adresses <b style="color:orange">Ip Ko </b> sans cons�quence
             <a href="#info"><img src="../../assets/img/Info.png" alt="Infos" title="Informations" style="width:2.5rem;"></a>
          </h4></u>
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
                    if ($ipBdd[$i]['status'] == "Ko" && (($ipBdd[$i]['type'] != 'SRV') && ($ipBdd[$i]['type'] != 'BOX') && ($ipBdd[$i]['type'] != 'Imprimante') && ($ipBdd[$i]['type'] != 'Surveillance'))) {
                         ?>
                         <td class="borderBusyIp bckgroundKoNormal" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                              <b style="color:red">
                                   <?php
                                        echo ($ipBdd[$i]['ip']) . "<br";
                                   ?>
                              </b>
                              <b style="color:Blue ">
                                   <?php
                                        echo ($ipBdd[$i]['name']) . "<br>";
                                   ?>
                              </b>
                              <b style="color:Gray">
                                   <?php
                                        echo ($ipBdd[$i]['type']);
                                   ?>
                              </b>
                         </td>
                         <?php
                         $numberIpKoN++;
                    } else {
                         $t--;
                    }
                    $i++;
               }
          }
          ?> <i><b style="color:orange; font-size:2em"> <?php
          echo $numberIpKoN;
          $NbrIpParCat = $NbrIpParCat + $numberIpKoN;
     ?> 
     </b></i>
     </tr></table>
</div>

<br><hr>


<!-- Display dataIpOK -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     $t = 1;
        
     $numberIpOk = 0;  
     ?>

     <table class="borderSpacer" style="margin:auto"> 
          <u><h4>
             Adresses <b style="color:Green">Ip OK</b>
             <a href="#info"><img src="../../assets/img/Info.png" alt="Infos" title="Informations" style="width:2.5rem;"></a>
          </h4></u>
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
                    if ($ipBdd[$i]['status'] == "OK") {?>
                         <td class="borderBusyIp bckgroundOk" onclick="document.location='/public/index.php/resultSearch/<?= $ipBdd[$i]['ip'] ?>'">
                              <b style="color:red">
                                   <?php
                                        echo ($ipBdd[$i]['ip']) . "<br";
                                   ?>
                              </b>
                              <b style="color:Blue ">
                                   <?php
                                        echo ($ipBdd[$i]['name']) . "<br>";
                                   ?>
                              </b>
                              <b style="color:Gray">
                                   <?php
                                        echo ($ipBdd[$i]['type']);
                                   ?>
                              </b>
                         </td>
                    <?php
                    $numberIpOk++;
                    } else {
                         $t --;
                    }
                    $i++;
               }
          }
          ?> <i><b style="color:green; font-size:2em"> <?php
          echo $numberIpOk;
          $NbrIpParCat = $NbrIpParCat + $numberIpOk;
     ?> 
     </b></i>
     </tr></table>
</div>

<br><hr>

<!-- Display dataIpNotAssigned -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i = 0;
     $m = 1;
     $t = 1;
     
     $numberIp = 0;

     ?>

     <table class="borderSpacer" style="margin:auto"> 
          <b><u><h4>
               Adresses <b style="color:grey">Ip</b> non assign�es     
               <a href="#info"><img src="../../assets/img/Info.png" alt="Infos" title="Informations" style="width:2.5rem;"></a>
          </h4></u></b>
          
          <?php
          for ($o = 1; $o<=$NbrIp; $o++)
          {                       
               if (($ipBdd[$i]["ip"]) != ($ipFreeArray[$o]["ip"])) {                   
                    if ($m == $t ){
                         ?> </tr><tr> <?php
                         $m += $NbrColonne;
                         $t++;
                    } else {
                         $t++;
                    }
                    ?>
                         <td class="borderFreeIp FreeTile">
                              <b class="colorTextAddIp">
                              <?php
                                   echo "192.168.0.$o" . "<br>";
                              ?>       
                         </td>
                    <?php    
                    $numberIp++;              
               } else {
                    $i++;
               }    
          }
          ?> <i><b style="color:grey; font-size:2em"> <?php
          echo $numberIp;
          ?> 
          </b></i>
     </tr></table>
</div>

<br><hr>
<!-- Display news -->
<div>
     <table class="borderTab" style="margin:auto"> 
          <center>
               <b><u><h4>
                    Statistique <b style="color:grey"></b> des adresses Ip     
                    <a href="#haut"><img src="../../assets/img/top.png" alt="top" title="Retour en haut" style="width:3rem;"></a>
               </h4></u></b>
               <a id="info"></a>
          
               <tr style="background-color:#FDFF8B">
                    <th class="borderTab">
                         D�signation
                    </th>
                    <th class="borderTab">
                         Ip assign�e
                    </th>
                    <th class="borderTab">
                         Ip non assign�e
                    </th>
                    <th class="borderTab">
                         Total
                    </th>
               </tr>
               <tr>
                    <td class="borderTab bckgroundKo">
                         Ip Ko critique
                    </td>
                    <td class="borderTab bckgroundKo">
                         <?php echo $numberIpKoSurv; ?>
                    </td>
                    <td class="borderTab" style="background:lightgrey" rowspan="4">

                    </td>
                    <td class="borderTab" style="background:lightgrey" rowspan="4">

                    </td>               
               </tr>
               <tr>
                    <td class="borderTab" style="background:#66BBFF">
                         Ip non vue
                    </td>
                    <td class="borderTab" style="background:#66BBFF">
                         <?php echo $numberIpKoNotView; ?>
                    </td>            
               </tr>
               <tr>
                    <td class="borderTab bckgroundKoNormal" style="color:black">
                         Ip ko non critique
                    </td>
                    <td class="borderTab bckgroundKoNormal" style="color:black">
                         <?php echo $numberIpKoN; ?>
                    </td>              
               </tr>
               <tr>
                    <td class="borderTab bckgroundOk" style="color:black">
                    Ip Ok
                    </td>
                    <td class="borderTab bckgroundOk" style="color:black">
                         <?php echo $numberIpOk; ?>
                    </td>              
               </tr>
               <tr style="background-color:#FDFF8B" >
                    <td class="borderTab" style="font-weight:bold">
                         Total
                    </td>
                    <td class="borderTab" style="font-weight:bold">
                         <?php echo ($numberIpKoNotView + $numberIpKoN + $numberIpKoSurv + $numberIpOk); ?>
                    </td>
                    <td class="borderTab" style="font-weight:bold">
                         <?php echo ($NbrIp-($numberIpKoNotView + $numberIpKoN + $numberIpKoSurv + $numberIpOk)); ?>
                    </td>
                    <td class="borderTab" style="font-weight:bold">
                         <?php echo (($numberIpKoNotView + $numberIpKoN + $numberIpKoSurv + $numberIpOk) + ($NbrIp-($numberIpKoNotView + $numberIpKoN + $numberIpKoSurv + $numberIpOk))); ?>
                    </td>              
               </tr>
                    <br><br>
          </center>
     </tr></table>
</div>

<br><br><br><hr><br><br><br>

<?php include __DIR__ . "/../baseClose.html.php"; ?>