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

<!-- Display data -->
<div class="borderSpacer" style="text-align:center">
     <?php
     $i =0;
     $m = 0;
     $NbrColonne = 10;
     ?> 
     <!-- <table style="margin:auto">  -->
     <table class="borderTileIpFree borderSpacer" style="margin:auto"> <?php
          for ($o = 0; $o<255; $o++)
          {
               if ($ipBdd[$i] == $ipFreeArray[$o])
               {                         
                    ?> 
                    <?php if ($m == $o ){
                    ?> </tr><tr> <?php
                         $m += $NbrColonne;
                    } else {
                    }
                    ?>
                         <td class="border NotFreeTile" >
                              <section class="colorTextNotFreeIp">
                                   <?php
                                        echo "192.168.0.$o" . "<br>" . " Ip déjà utilisée";
                                   ?>
                              </section>
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
                              <b class="colorTextFree">
                                   <?php
                                        echo "Adresse ip libre " . "<br>";
                                   ?>
                              </b>
                              <b class="colorTextAddIp">
                                   <?php
                                        echo "192.168.0.$o" . "<br>";
                                   ?>                    
                              </b>
                         </td>
                    <?php
               }                           
          }
     ?> </table>
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>