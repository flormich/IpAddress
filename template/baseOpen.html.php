<!DOCTYPE HTML>
<html>

  <head>
      <title>Ip Address</title>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Addresse IP Lorge">
  
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
      <link rel="stylesheet" href="/assets/css/tuiles.css">
      <link rel="stylesheet" href="/assets/css/essai.css">

      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>   
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </head>  

  <body>

  <div></div>
  <?php
    foreach($ipAddresses as $ipAddress):
      if ($ipAddress->getIp() == '192.168.0.254' && $ipAddress->getStatus() == 'OK'){
          $IpAddressLastDate = $ipAddress->getDateDernOn();
      } else {
        $IpAddressLastDate = '0001-01-01 00:00';
      }
		endforeach;
  ?>
    </div>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header backgroundPage" >
      <div class="mdl-card mdl-cell mdl-cell--12-col backgroundPage">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">

          <!-- home -->
            <a href="/public/"><img src="/assets/img/Home.png" alt="Homepage" title="Homepage" style="width:4rem"></a>
          <!-- Ping total -->
            <a class="mdl-navigation__link" href="/template/app/pingTotalite.html.php">Ping Total</a>
          <!-- Ping Update -->
            <a class="" href="/public/index.php/ipUpdate"><img src="/assets/img/Refresh.png" alt="Ping Update" title="Ping Update" style="width:4rem"></a>
          
          <!-- Drop down --> 
            <a id="menu-speed" class="">
              <img src="/assets/img/sort-desc.png" style="width:3.5rem">
            </a>

            <ul class="mdl-menu mdl-js-menu DropDownMenu" for="menu-speed">
              <li class="mdl-menu__item">
                <a class="" href="/public/"><img src="/assets/img/Home.png" alt="Ping Tous" title="Affichage tous les ping" style="width:2rem"></a> : Tous
              </li>

              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/pingComputer"><img src="/assets/img/computer.png" alt="Ping Ordi" title="Affichage ping ordi" style="width:2rem"></a> : Ordi
              </li>

              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/pingSrv"><img src="/assets/img/server-rack.png" alt="Ping Serveur" title="Affichage ping serveur" style="width:2rem"></a> : Srv
              </li>
          
              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/printer"><img src="/assets/img/Printer.png" alt="Ping Imprimante" title="Affichage ping imprimante" style="width:2rem"></a> : Imprimante
              </li>

              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/label"><img src="/assets/img/ticket.png" alt="Ping Zebra" title="Affichage ping zebra" style="width:2rem"></a> : Zebra
              </li>

              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/oversight"><img src="/assets/img/webcam.png" alt="Ping Surveillance" title="Affichage ping surveillance" style="width:2rem"></a> : Surveillance
              </li>

              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/other"><img src="/assets/img/other.png" alt="Ping other" title="Affichage ping other" style="width:2rem"></a> : Other
              </li>
              <li>
                <hr>
              </li>
              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/ok"><img src="/assets/img/Renew.png" alt="Ping other" title="Affichage ping other" style="width:2rem"></a> : Ok
              </li>
              <li class="mdl-menu__item">
                <a class="" href="/public/index.php/ko"><img src="/assets/img/Stop.png" alt="Ping other" title="Affichage ping other" style="width:2rem"></a> : Ko
              </li>
            </ul>

            <div class="mdl-layout-spacer"></div>

            <b style="text-align:center"> 
              <?php               
              echo "Dernier Ping effectué le :" . "<br>" . date('d/m/Y', strtotime($IpAddressLastDate)). "<br>" . date('H:i', strtotime($IpAddressLastDate)); 
              ?> 
            </b>
          
          <!-- Space between left icon and right icon-->
            <div class="mdl-layout-spacer"></div>
          
          <!-- Left icon -->
            <a class="mdl-navigation__link" href="/public/index.php/pingOkDansBDD">Envoyer les ping Ok dans la BDD</a>          
          <!-- Delete Toute la BDD -->
            <a class="" href="/public/index.php/deleteAll"><img src="/../assets/img/Trash.png" alt="Delete la BDD" title="Delete la BDD" style="width:4rem"></a>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                        mdl-textfield--floating-label mdl-textfield--align-right">                  
              <!-- <label class="mdl-button mdl-js-button mdl-button--icon"
                    for="fixed-header-drawer-exp">
                <i class="material-icons">search</i>
              </label> -->
              <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" name="sample"
                      id="fixed-header-drawer-exp">
              </div>
            </div>
          </div>
        </header>

        <!-- <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Liste</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
          </nav>
        </div> -->

        <main class="mdl-layout__content">
          <main>
            <div class="page-content">