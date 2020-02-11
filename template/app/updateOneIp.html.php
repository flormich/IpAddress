<?php include __DIR__ . "./../baseOpen.html.php";	?>
<br>

<div class="demo-list-action ">
	<form method="post" action="inserer">
		<table class="borderSpacer ">
		<br>
			<tr>
				<?php foreach($ipAddresses as $key=>$ipAddress): 

				include __DIR__ . "/../tile.html.php"; ?>
							
						</td>		
						<td>
							<table class="TextDescriptiveOneIp">
								<tr>
									<td>Id : </td>
									<td><input readonly type="number" name="id" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getId() ?>"></td>
								</tr>
								<tr>
									<td>Ip : </td>
									<td><input readonly type="text" name="ip" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getIp() ?>"></td>
								</tr>
								<tr>
									<td>Status : </td>
									<td><input type="text" name="status" value="<?php echo $ipAddress->getStatus() ?>"></td>
								</tr>
								<tr>
									<td>Nom : </td>
									<td><input type="text" name="name" value="<?php echo $ipAddress->getName() ?>" autofocus></td>
								</tr>
								<tr>
									<td>Type : </td>
									<td><input type="text" name="typeMat" value="<?php echo $ipAddress->getTypeMat() ?>"></td>
								</tr>
								<tr>
									<td>Détail : </td>
									<td><input type="textarea" name="detail" value="<?php echo $ipAddress->getDetail() ?>"></td>
								</tr>

								<tr>
									<td style="height:50px"></td>
								</tr>

								<tr>
									<td>Date découverte : </td>	
									<td><input readonly type="text" name="dateDecouvert" style="background-color:#EBEBE4" value="<?php echo date('l : d F Y', strtotime($ipAddress->getDateDecouvert())) ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png"  alt=""></td><td><input readonly type="text" name="dateDecouvert" style="background-color:#EBEBE4" value="<?php echo 'at ' . date('H:i', strtotime($ipAddress->getDateDecouvert())) . ' hour(s)' ?>"></td>
								</tr>
								<tr>
									<td style="height:10px"></td>
								</tr>
								<tr>
									<td>Date du dernier Ok : </td>
									<td><input type="text" name="dateDernOn" value="<?php echo $ipAddress->getDateDernOn() ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png"  alt=""></td><td><input readonly type="text" name="" style="background-color:#EBEBE4" value="Voir ci-contre"></td>
								</tr>

								<tr>
									<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Date du Ko : " ;}; ?> </td>
									<?php if ($ipAddress->getStatus() == "OK") { ?>									
									<?php } else { ?>
										<td><input type="text" name="dateKo" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo $ipAddress->getDateKo();}; ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png"  alt=""></td><td><input type="text" name="" style="background-color:#EBEBE4" value="Voir ci-contre"></td>
									<?php } ?>
								</tr>
							</table>						
						</td>
				<?php endforeach; ?>
				</tr>
				</td>
			</tr>		
		</table>

		<table style="margin:auto">
			<td><button type="submit" ><img class="iconValidate" src="/assets/img/Apply.png" alt="edit" title="Edit de <?= $ipAddress->getIp()?>"></td>
		</table>

	</form>
	<br><br>
</div>
<?php include __DIR__ . "/../baseClose.html.php"; ?>