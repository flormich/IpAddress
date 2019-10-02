<?php 
	include __DIR__ . "/../baseOpen.html.php";
?>

<!-- <div >
	<table class="iconTop">
		<a href="http://localhost.lorge.ipaddress/public/">
			<img src="../../assets/img/Full Trash.png" alt="Trash 1 ip" title="Trash 1 ip" style="width:3%">
		</a>
	</table>
</div> -->

<div class="demo-list-action ">
	<table class="borderSpacer ">
		<?php
			$nbrDIpParLigne = 11;
			$nbrDIp = 510;
			$nbrDeLigne = $nbrDIp / $nbrDIpParLigne;

		for ($i = 0; $i<$nbrDeLigne; $i++) { ?>
			<tr>
				<?php foreach($ipAddresses as $key=>$ipAddress): ?>
				<?php
				if ($key >= ($nbrDIpParLigne * $i) && $key < ($nbrDIpParLigne * ($i+1))) { ?>
					<?php if ($ipAddress->getStatus() == 'Ko') 
					{
						?> <td class="fontTableau fontTableauKo"> <?php
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
									switch ($ipAddress->getTypeMat()) {
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
										case '' :
											?>
											<b style="color:Blue">
											<?= $ipAddress->getName() . "<br>" ?></b>
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
										if (!empty($ipAddress->getDateDernOn())){
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
									<img src="../../assets/img/Renew.png" style="width:50%">
									<?php
										} else {
									?>	
									<div>
										<img src="../../assets/img/Stop.png" style="width:50%">
										<span class="infobulle">
											
											<span class="text-hover">
												<?php
												$timeNow = date('d-m-Y H:i');
												$dateKo = $ipAddress->getDateKo();	
												
												$datetime1 = new DateTime($timeNow);
												$datetime2 = new DateTime($dateKo);
												$difference = $datetime1->diff($datetime2);
												echo 
												"<br>" . 'Ko depuis : ' ."<br>" 
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
										</span>
									</div>
								</td>
							</tr>
							<tr class="heightDelete">
								<td>
									<a href="/public/index.php/delete/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="../../assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipAddress->getIp()?>" ></a>
									<a href="/public/index.php/edit/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="../../assets/img/edit_2.png" alt="edit" title="Edit de <?= $ipAddress->getIp()?>" ></a>
								</td>
							</tr>
						</table>
					</td>
				<?php };  ?>
				<?php endforeach; ?>
			</tr>
		<?php };  ?>
	</table>
</div>
<?php include __DIR__ . "/../baseClose.html.php"; ?>