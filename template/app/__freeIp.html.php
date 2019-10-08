<?php
     include __DIR__ . "/../baseOpen.html.php";

     $ipBdd = array ();
     foreach ($ipAddresses as $ipAddress) {
     $ipBdd[] = [
          'ip' => $ipAddress->getIp() . "<br>"
     ];
     }

     $ipFreeArray = array ();
     $ip = 0 ;
     for ($ip = 0; $ip<255; $ip++) {
          $ipFreeArray[] = [
               'ip' => $ipFree = "192.168.0.$ip" ."<br>"
          ];
     }

?>

<br>
<br>

<!-- Display data -->
<div style="text-align:center">
<!-- <table class="border"> -->
     <?php
     $i =0;

          for ($o = 0; $o<255; $o++){
               ?> 
          <table class="border"> 
               <?php
          if ($ipBdd[$i] == $ipFreeArray[$o]){

                    ?> 
               <tr style="text-align:center">
                         <td>
                              <section style="color:red">
                                        <?php
                                   echo "192.168.0.$o" . "<br>" . " Ip déjà utilisée";
                                   ?>
                         </section>
                    </td>
                    <?php
                         $i++;     
                    } else {     
                         ?>
                    <td>
                         <b style="color:blue">
                                   <?php
                              echo "Adresse ip libre " . "<br>";
                              ?>
                         </b>
                         <b style="color:green"><?php
                              echo "192.168.0.$o" . "<br>";
                              ?>                    
                         </b>
                    </td>
                    <?php
                    }
                    ?>
               </tr>
          </table>
          <?php     
          }
     ?>
     <!-- </table> -->
</div>
<?php include __DIR__ . "/../baseClose.html.php"; ?>





<!-- Display data -->
<div style="text-align:center">
<!-- <table class="border"> -->
     <?php
          $ligne = 10;
          $p = 1;

     for ($q=1; $q<=5; $q++) 
     { 
          ?> <table style="margin:auto" > <?php
          
          if ($p % $ligne == 1) 
          {
               ?> <tr > <?php               
               while ($p < $ligne) 
               {
                    ?> <td class="border">  <?php
                    echo "oui";
                    $p++;
                    ?> </td> <?php
               }; 
               ?> </tr><?php
          }
          $p = 1;
          ?> </table>     <?php
     } 
     ?>
     </table>
</div>