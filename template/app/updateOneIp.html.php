<?php include __DIR__ . "./../baseOpen.html.php";	?>
<br>

<div class="demo-list-action ">
	<table class="borderSpacer ">
	<br>
		<tr>
		<form method="post" action="inserer">

			<?php foreach($ipAddresses as $key=>$ipAddress): 

			include __DIR__ . "/../tile.html.php"; ?>
						
					</td>		
					<td>
						<table class="TextDescriptiveOneIp">
							<!-- <form method="post" action="inserer"> -->
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
									<td><input type="text" name="name" value="<?php echo $ipAddress->getName() ?>"></td>
								</tr>
								<tr>
									<td>Type : </td>
									<td><input type="text" name="typeMat" value="<?php echo $ipAddress->getTypeMat() ?>"></td>
								</tr>

								<tr>
									<td style="height:50px"></td>
								</tr>

								<tr>
									<td>Date du dernier Ok : </td>
									<td><input type="text" name="dateDernOn" value="<?php echo $ipAddress->getDateDernOn() ?>"></td>
								</tr>
								<tr>
									<td>Heure dernier Ok : </td>
									<td><input readonly type="text" name="" style="background-color:#EBEBE4" value="Voir ci-dessus"></td>
								</tr>

								<tr>
									<td style="height:10px"></td>
								</tr>

								<tr>
								<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Date du Ko : " ;}; ?> </td>
								<td>
									<?php if ($ipAddress->getStatus() == "OK") { ?>									
									<?php } else { ?>
										<input type="text" name="dateKo" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo $ipAddress->getDateKo();}; ?>">
									<?php } ?>
								</td>
								</tr>
								<tr>
									<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Heure du Ko : " ;}; ?> </td>
									<td>
										<?php if ($ipAddress->getStatus() == "OK") { ?>									
										<?php } else { ?>
											<input type="text" name="" style="background-color:#EBEBE4" value="Voir ci-dessus">
										<?php } ?>
									</td>
								</tr>

								<!-- <tr>
									<td>Date du dernier Ko : </td>
									<td><input type="text" name="dateKo" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo $ipAddress->getDateKo();}; ?>"></td>
								</tr>
								<tr>
								<td>Heure dernier Ko : </td>
									<td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4" value="Voir ci-dessus"></td>
								</tr> -->

								<!-- <tr style="height:20px"></tr> -->
								<!-- <tr>									
									<td></td>
									<td><button type="submit"><img class="iconValidate" src="/assets/img/Apply.png" alt="edit" title="Edit de <?= $ipAddress->getIp()?>"></td>
								</tr> -->
							<!-- </form> -->
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