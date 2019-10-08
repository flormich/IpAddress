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
<div style="text-align:center">
     <?php
     $i =0;
     $module = 4;

          ?> 
          <!-- <table style="margin:auto">  -->
               <?php
               for ($o = 0; $o<255; $o++)
               {
                    ?> <table style="margin:auto"> <?php
                    if ($ipBdd[$i] == $ipFreeArray[$o])
                    {                         
                         ?> 
                         <?php if ($module %5 ==0) { ?>
                              <table><tr>
                                   <?php
                         } else {?>
                              <td class="border" >
                                   <section style="color:red">
                                        <?php
                                             echo "192.168.0.$o" . "<br>" . " Ip déjà utilisée";
                                        ?>
                                   </section>
                              </td>
                              <?php
                         }
                              $i++;     
                    } else {     
                         ?>
                              <td class="border">
                                   <b style="color:blue">
                                        <?php
                                             echo "Adresse ip libre " . "<br>";
                                        ?>
                                   </b>
                                   <b style="color:green">
                                        <?php
                                             echo "192.168.0.$o" . "<br>";
                                        ?>                    
                                   </b>
                              </td>
                              <?php
                              ?>
                         <?php if ($module % 5 == 0) {
                              ?> </table></tr> <?php
                         }

                    }          
               ?> </table> <?php
               }

?>
          <!-- </table> -->
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>
          