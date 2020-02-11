<?php
	include __DIR__ . "/../baseOpen.html.php";
     ?><br>

     
<HTML>
     <HEAD>
          <TITLE></TITLE>
     </HEAD>

     <BODY>     
          <BR>
          <CENTER>
          <H3>Recherche d'une adresse IP : </H3>
          <DIV>
          <br>
               <FORM ACTION="../../public/index.php/resultSearch" METHOD="POST">
                    <INPUT TYPE="text" NAME="name" style="font-size:1.5em; text-align:center; font-weight:bold" value="192.168.0." autofocus>
               <BR><BR><br>
			<td><button type="submit"><img class="iconValidate" src="/assets/img/Apply.png" alt="Search" title="Rechercher"></td>
               </CENTER>
               </FORM>
               
          </DIV>
          <br><br><br><br><br><br><br><br><br><br><br>
     </BODY>
</HTML>