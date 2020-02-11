<?php include __DIR__ . "/../baseOpen.html.php"; ?>
<br>
<?php include "../config/variable.php"; ?>

<div class="demo-list-action ">
	<table class="borderSpacer ">
	<br>
		<tr>
			<?php foreach($ipAddresses as $key=>$ipAddress):

			include __DIR__ . "/../tile.html.php"; ?>		
			<td>
				<table class="TextDescriptiveOneIp">
					<form method="post" action="inserer">
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
							<td><input readonly type="text" name="status" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getStatus() ?>"></td>
						</tr>
						<tr>
							<td>Nom : </td>
							<td><input readonly type="text" name="name" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getName() ?>"></td>
						</tr>
						<tr>
							<td>Type : </td>
							<td><input readonly type="text" name="typeMat" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getTypeMat() ?>"></td>
						</tr>
						<tr>
							<td>Détail : </td>
							<td><input readonly type="textarea" name="detail" style="background-color:#EBEBE4" value="<?php echo $ipAddress->getDetail() ?>"></td>
						</tr>

						<tr>
							<td style="height:50px"></td>
						</tr>

						<tr>
							<td>Date découverte : </td>
							<td><input readonly type="text" name="dateDecouvert" style="background-color:#EBEBE4" value="<?php echo date('l : d F Y', strtotime($ipAddress->getDateDecouvert())) ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png" alt=""></td><td><input readonly type="text" name="dateDecouvert" style="background-color:#EBEBE4" value="<?php echo 'at ' . date('H:i', strtotime($ipAddress->getDateDecouvert())) . ' hour(s)' ?>"></td>
						</tr>	
						<tr>
							<td style="height:10px"></td>
						</tr>							
						<tr>
							<td>Date du dernier Ok : </td>
							<td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4" value="<?php echo date('l : d F Y', strtotime($ipAddress->getDateDernOn())) ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png" alt=""></td><td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4" value="<?php echo 'at ' . date('H:i', strtotime($ipAddress->getDateDernOn())) . ' hour(s)' ?>"></td>
						</tr>
															
						<tr>
							<td><?php if ($ipAddress->getStatus() == "OK") {echo "";} else { echo "Date du Ko : " ;}; ?> </td>
							<?php if ($ipAddress->getStatus() == "OK") { ?>									
							<?php } else { ?>
								<td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo date('l : d F Y', strtotime($ipAddress->getDateKo())) ;}; ?>"></td><td><img style="width:1.5rem" src="/assets/img/arrow-right.png" alt=""></td><td><input readonly type="text" name="dateDernOn" style="background-color:#EBEBE4" value="<?php if ($ipAddress->getStatus() == "OK") {echo "";} else {echo 'at ' . date('H:i', strtotime($ipAddress->getDateKo())) . ' hour(s)' ;}; ?>"></td>
							<?php } ?>	
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