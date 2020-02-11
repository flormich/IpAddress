<?php
	if ($ipAddress->getStatus() == 'Ko' && (($ipAddress->getTypeMat() == 'SRV') || ($ipAddress->getTypeMat() == 'BOX') || ($ipAddress->getTypeMat() == 'Imprimante') || ($ipAddress->getTypeMat() == 'Surveillance'))){
		?> <td class="fontTableau fontTableauKo"> <?php
	} 
	else if ($ipAddress->getStatus() == 'Ko') 
	{
		?> <td class="fontTableau fontTableauKoNormal" > <?php
	} 
	else { 
		?> <td class="fontTableau fontTableauOK" > <?php 
	} 
		?>
		<table class="heightTable">
			<tr class="heightTitle">
				<td>
					<?=	$ipAddress->getIp();?>
					<br>

					<?php 
					switch ($ipAddress->getTypeMat()) 
					{
						case 'PC':
						?>
							<b style="color:#B2892C">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case 'MAC':
						?>
							<b style="color:#B2892C">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case 'Etiquette':
						?>
							<b style="color:DarkViolet">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case 'Imprimante' :
						?>
							<b style="color:#6DA329">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case 'Scanner' :
						?>
							<b style="color:blue">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case 'SRV' :
						?>
							<b style="color:#B22C2C">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
							break;
						case '' :
						?>
							<b style="color:Blue">
								<?= $ipAddress->getName() . "<br>" ?>
							</b>
							<i style="color:Grey">
							<?= " ( Type: ?? )";
							break;

						default:
						?>
							<b style="color:Blue">
								<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")"; ?>
							</b>
						<?php
					}
					?>
				</td>
			</tr>

			<tr class="heightInfo">
				<td>
					<?php
					if (!empty($ipAddress->getDateDernOn()))
					{
						if($ipAddress->getStatus() == 'OK')
						{
							?><span class="infobulleDiscovery">												
								<span class="text-hover-discovery">
									<?php echo "Découvert le : " . date('d/m/Y', strtotime($ipAddress->getDateDecouvert())). "<br>" . date('H:i', strtotime($ipAddress->getDateDecouvert())); ?>
								</span>												
								<span class="text-base-discovery">										
									<?php echo "Ok le :" . "<br>" . date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn())); ?>
								</span>
							</span></<span><?php
						} else {
							?><span class="infobulleDiscovery">												
								<span class="text-hover-discovery">
									<?php echo "Découvert le : " . date('d/m/Y', strtotime($ipAddress->getDateDecouvert())). "<br>" . date('H:i', strtotime($ipAddress->getDateDecouvert())); ?>
								</span>												
								<span class="text-base-discovery">										
									<?php echo "Dernier ping Ok " . "<br>" . date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn())); ?>
								</span>
							</span></<span><?php

							// echo "Dernier ping OK : " . "<br>";
							// echo date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn()));											
						}																				
					} else {
						echo " No date" . "<br><br>";
					}
					?>
						<br>
					<?php 
					if($ipAddress->getStatus() == 'OK')
					{
						?>
						<img src="/assets/img/Renew.png" onclick="document.location='/public/index.php/resultSearch/<?= $ipAddress->getIp() ?>'" style="width:50%">
						<?php
					} else {
						?>	
						<div>
							<img src="/assets/img/Stop.png" onclick="document.location='/public/index.php/resultSearch/<?= $ipAddress->getIp() ?>'" style="width:50%">
							<span class="infobulle">												
								<span class="text-hover">
									<?php
									$timeNow = date('d-m-Y H:i');
									$dateKo = $ipAddress->getDateKo();	
														
									$datetime1 = new DateTime($timeNow);
									$datetime2 = new DateTime($dateKo);
									$difference = $datetime1->diff($datetime2);
									echo "<br>" . 'Ko depuis : ' ."<br>" 
										.$difference->y.' an - '																							
										.$difference->m.' mois - '
										.$difference->d.' j ' ."<br>"
										.$difference->h.'h ' 
										.$difference->i. 'min';										
										?>
								</span>												
								<span class="text-base">									
									<?php
									echo "<br>" . "Ko depuis le : " . "<br>";
									echo date('d/m/Y', strtotime($ipAddress->getDateKo())). "<br>" . date('H:i', strtotime($ipAddress->getDateKo())) . "<br>";
									?>
								</span>
							</span>
						</div>
					<?php 
					};
					?>
				</td>
			</tr>

			<tr class="heightDelete">
				<td>
					<a href="/public/index.php/delete/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="/assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipAddress->getIp();?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\' adresse de : <?= $ipAddress->getName() . " soit l\' IP N° : " . $ipAddress->getIp() ?> ?')"></a>
					<a href="/public/index.php/edit/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipAddress->getIp()?>" ></a>
					<?php 
					if ($ipAddress->getTypeMat() == 'Imprimante' OR ($ipAddress->getTypeMat() == 'SRV') OR ($ipAddress->getTypeMat() == 'Etiquette') OR ($ipAddress->getTypeMat() == 'BOX') OR ($ipAddress->getTypeMat() == 'Routeur') OR ($ipAddress->getTypeMat() == 'Switch') OR ($ipAddress->getTypeMat() == 'Scanner') OR (($ipAddress->getTypeMat() == 'Zebra'))) 
					{
					?>
						<a href="\\<?= $ipAddress->getIp()?>" target="_blank"> <img class="icoGauche" src="/assets/img/link.png" alt="edit" title="Lien vers <?= $ipAddress->getIp()?>" ></a>
					<?php 
					} else {} ?>
				</td>
			</tr>
		</table>
						
