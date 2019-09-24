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
	<table class="borderSpacer">
			<?php
				$nbrDIpParLigne = 11;
				$nbrDeIp = 510;
				$nbrDeLigne = $nbrDeIp / $nbrDIpParLigne;
			?>
			<?php for ($i = 0; $i<$nbrDeLigne; $i++) { ?>
			<tr>
				<?php foreach($ipAddresses as $key=>$ipAddress): ?>
				<?php
				if ($key >= ($nbrDIpParLigne * $i) && $key < ($nbrDIpParLigne * ($i+1))) { ?>
					<td class="fontTableau">
						<table class="heightTable">
							<tr class="heightTitle">
								<td>
									<?= $ipAddress->getIp();?>
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
										if (!empty($ipAddress->getDateDernOn())){
											echo date('d/m/Y', strtotime($ipAddress->getDateDernOn())). "<br>" . date('H:i', strtotime($ipAddress->getDateDernOn()));											
										} else {
											echo " ";
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
									<img src="../../assets/img/Stop.png" style="width:50%">
									<?php
										echo date('d/m/Y', strtotime($ipAddress->getDateKo())). "<br>" . date('H:i', strtotime($ipAddress->getDateKo()));
									};
									?>	
								</td>
							</tr>
							<tr class="heightDelete">
								<td>
									<a href="./delete/<?= $ipAddress->getIp()?>"> <img class="icoDroit" src="../../assets/img/Full Trash.png" alt="delete" title="Delete de <?= $ipAddress->getIp()?>" ></a>
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