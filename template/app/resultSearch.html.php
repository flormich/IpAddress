<?php include __DIR__ . "/../baseOpen.html.php"; ?>
<br>

<div class="demo-list-action ">
	<table class="borderSpacer ">
	<br>
		<tr>
			<?php foreach($ipAddresses as $key=>$ipAddress):
				if ($ipAddress->getStatus() == 'Ko' && (($ipAddress->getTypeMat() == 'SRV') || ($ipAddress->getTypeMat() == 'BOX') || ($ipAddress->getTypeMat() == 'Imprimante') || ($ipAddress->getTypeMat() == 'Surveillance'))){
					?> <td class="fontTableau fontTableauKo"> <?php
				} 
				else if ($ipAddress->getStatus() == 'Ko')
				{
					?> 
					<td class="fontTableau fontTableauKoNormal"> <?php
				} else {
					?> <td class="fontTableau fontTableauOK"> <?php
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
								case 'SRV' :
								?>
									<b style="color:#B22C2C">
										<?= $ipAddress->getName() . "<br>" . " (" . $ipAddress->getTypeMat() . ")";
									break;

								default:
								?>
									<b style="color:Blue">
										<?= $ipAddress->getName(); ?>
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
									if($ipAddress->getStatus() == 'OK'){
										echo "" . "<br>";
										echo date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn()));
									} else {
										echo "Dernier ping OK : " . "<br>";
										echo date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn()));
									}
								} else {
									echo " No date";
								}
							?>
							<br>
							<?php if($ipAddress->getStatus() == 'OK')
								{
								?>
							<img src="/assets/img/Renew.png" style="width:50%">
							<?php
								} else {
									?>
							<div>
								<img src="/assets/img/Stop.png" style="width:50%">
								<span class="infobulle"></span>
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
								};
									?>
								</span>
							<!-- </span> -->
							</div>
						</td>
					</tr>
					<tr class="heightDelete">
						<td>
                                   <a href="/public/index.php/delete/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="/assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipAddress->getIp()?>" ></a>
                                   <a href="/public/index.php/edit/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="/assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipAddress->getIp()?>" ></a>
							<?php 
							if ($ipAddress->getTypeMat() == 'Imprimante' OR ($ipAddress->getTypeMat() == 'SRV') OR ($ipAddress->getTypeMat() == 'Etiquette') OR ($ipAddress->getTypeMat() == 'BOX') OR ($ipAddress->getTypeMat() == 'Routeur') OR ($ipAddress->getTypeMat() == 'Switch')) {
							?>
								<a href="\\<?= $ipAddress->getIp()?>" target="_blank"> <img class="icoGauche" src="/assets/img/link.png" alt="edit" title="Lien vers <?= $ipAddress->getIp()?>" ></a>
								<?php } else {} ?>
						</td>
					</tr>
				</table>
				</td>		
				<td>
					<table class="TextDescriptiveOneIp">
						<form method="post" action="inserer">
							<tr>
								<td>Id : </td>
								<td><input readonly type="number" name="id" style="background-color:#EBEBE4; width:200px" value="<?php echo $ipAddress->getId() ?>"></td>
							</tr>
							<tr>
								<td>Ip : </td>
								<td><input readonly type="text" name="ip" style="background-color:#EBEBE4; width:200px" value="<?php echo $ipAddress->getIp() ?>"></td>
							</tr>
							<tr>
								<td>Status : </td>
								<td><input readonly type="text" name="status" style="background-color:#EBEBE4; width:200px" value="<?php echo $ipAddress->getStatus() ?>"></td>
							</tr>
							<tr>
								<td>Nom : </td>
								<td><input readonly type="text" name="name" style="background-color:#EBEBE4; width:200px" value="<?php echo $ipAddress->getName() ?>"></td>
							</tr>
							<tr>
								<td>Type : </td>
								<td><input readonly type="text" name="typeMat" style="background-color:#EBEBE4; width:200px" value="<?php echo $ipAddress->getTypeMat() ?>"></td>
							</tr>

							<tr>
								<td style="height:50px"></td>
							</tr>
								
							<tr>
								<td>Date du dernier Ok : </td>
								<td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4; width:200px" value="<?php echo date('l : d F Y', strtotime($ipAddress->getDateDernOn())) ?>"></td>
							</tr>
							<tr>
								<td>Heure du dernier Ok : </td>
								<td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4; width:200px" value="<?php echo date('H:i', strtotime($ipAddress->getDateDernOn())) ?>"></td>
							</tr>
							<tr>
								<td style="height:10px"></td>
							</tr>
								
							<tr>
								<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Date du Ko : " ;}; ?> </td>
								<td>
									<?php if ($ipAddress->getStatus() == "OK") { ?>									
									<?php } else { ?>
										<input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4; width:200px" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo date('l : d F Y', strtotime($ipAddress->getDateKo())) ;}; ?>">
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Heure du Ko : " ;}; ?> </td>
								<td>
									<?php if ($ipAddress->getStatus() == "OK") { ?>									
									<?php } else { ?>
										<input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4; width:200px" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo date('H:i', strtotime($ipAddress->getDateKo())) ;}; ?>">
									<?php } ?>
								</td>
							</tr>
						</form>
					</table>						
				</td>
			<?php endforeach; ?>
		</tr>		
	</table>
	<br><br>
</div>

<?php include __DIR__ . "/../baseClose.html.php"; ?>