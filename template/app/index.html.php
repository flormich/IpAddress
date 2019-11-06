<?php include __DIR__ . "/../baseOpen.html.php"; ?>

<?php include "../config/variable.php"; ?>

     <div class="demo-list-action ">
          <table class="borderSpacer ">
               <?php
               $nbrDIpParLigne = 11;
               $nbrDIp = 510;
               $nbrDeLigne = $nbrDIp / $nbrDIpParLigne;

               for ($i = 0; $i<$nbrDeLigne; $i++) { 
               ?>
                    <tr>
                         <?php foreach($ipAddresses as $key=>$ipAddress):
                              if ($key >= ($nbrDIpParLigne * $i) && $key < ($nbrDIpParLigne * ($i+1))) { ?>


<?php include __DIR__ . "/../tile.html.php"; ?>

                    
                    </td>
                              <?php }; ?>
                         <?php endforeach; ?>
                    </tr>
               <?php }; ?>
          </table>
     </div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>