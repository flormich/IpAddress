<?php  include __DIR__ . "/../baseOpen.html.php"; ?>

<style> 
	/* .demo-list-action, .material-icons {margin:auto}  */
	.fontTableau {
		text-align: center; 
		padding : 10px;
		background-color: #F3F3F3;
		border:1px solid black;
		width: 30px;
	}
	/* a {text-decoration: none;} */
	.colorRed {
		color:red;
	}
	.colorGreen {
		color:green;
	}
	.borderSpacer {
		margin:auto;
		border-spacing:25px;
	}
</style>

<a class="mdl-navigation__link" href="../template/app/ping2.html.php">Ping2</a>

<div class="demo-list-action ">
	<table class="borderSpacer">
		<tbody>	
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
					<?= $ipAddress->getIp()?>
					<br>
					<?php echo "id = " .$ipAddress->getId() ?>
					<br>
					<?php
						if (!empty($ipAddress->getDateDernOn())){
							echo date('d/m/Y', strtotime($ipAddress->getDateDernOn()));
						} else {
							echo " ";
						}
					?>
					<br>
					<?php if($ipAddress->getStatus() == 'OK')
						{
					?> 
					<i class="material-icons text-center colorGreen ">thumb_up_alt</i>
					<?php
						} else {
					?>
					<i class="material-icons text-center colorRed">block</i>
					<?php
						};
					?>						
				</td>									
				<?php };  ?>
				<?php endforeach; ?>
			</tr>
			<?php };  ?>
		</tbody>
	</table>
</div>
<?php include __DIR__ . "/../baseClose.html.php"; ?>
