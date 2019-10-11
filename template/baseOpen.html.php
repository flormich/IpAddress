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
      <link rel="stylesheet" href="/assets/css/dropdown.css">
      <link rel="stylesheet" href="/assets/css/ipFree.css">

      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>   
  </head>  

  <body>
  <?php
    foreach($ipAddresses as $ipAddress):
      if ($ipAddress->getIp() == '192.168.0.254' && $ipAddress->getStatus() == 'OK'){
          $IpAddressLastDate = $ipAddress->getDateDernOn();
      } else {
        $IpAddressLastDate = '';
      }
		endforeach;
  ?>
    </div>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header backgroundPage" >
      <div class="mdl-card mdl-cell mdl-cell--12-col backgroundPage">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">

          <!-- home -->
            <a href="/public/"><img class="icoNiveau1" src="/assets/img/Home.png" alt="Homepage" title="Homepage"></a>
          <!-- Ping total -->
            <a class="mdl-navigation__link"  href="/template/app/pingTotalite.html.php##">Ping Total</a>
          <!-- Ping Update -->
            <a href="/public/index.php/ipUpdate"><img class="icoNiveau1" src="/assets/img/Refresh.png" alt="Update" title="Mise a jour"></a>

          <!-- Drop down 1 --> 
          <ul class="niveau1 ">
            <li>
              <img class="icoNiveau1" src="/assets/img/Find.png" alt="Find material" title="Afficher">
              <ul class="niveau2 DropDownMenu">
                <li>
                  <a href="/public/"><img class="icoNiveau2" src="/assets/img/Home.png" alt="Ping All" title="Tout afficher"></a> : Tous
                </li>
                <li>
                  <a href="/public/index.php/pingComputer"><img class="icoNiveau2" src="/assets/img/computer.png" alt="Ping Computer" title="Les ordinateurs"></a> : Ordi
                </li>
                <li>
                  <a href="/public/index.php/pingSrv"><img class="icoNiveau2" src="/assets/img/server-rack.png" alt="Ping Serveur" title="Affichage les serveurs"></a> : Srv
                </li>          
                <li>
                  <a href="/public/index.php/printer"><img class="icoNiveau2" src="/assets/img/Printer.png" alt="Ping Printer" title="Affichage les imprimantes"></a> : Imprimante
                </li>
                <li>
                  <a href="/public/index.php/label"><img class="icoNiveau2" src="/assets/img/ticket.png" alt="Ping Zebra" title="Affichage les zebras"></a> : Zebra
                </li>
                <li>
                  <a href="/public/index.php/oversight"><img class="icoNiveau2" src="/assets/img/webcam.png" alt="Ping Oversight" title="Affichage la surveillance"></a> : Surveillance
                </li>
                <li>
                  <a href="/public/index.php/other"><img class="icoNiveau2" src="/assets/img/other.png" alt="Ping other" title="Affichage le reste"></a> : Other
                </li>

                <li>
                  <hr>
                </li>

                <li>
                  <a href="/public/index.php/ok"><img class="icoNiveau2" src="/assets/img/Renew.png" alt="Ping Ok" title="Affichage les OK"></a> : Ok
                </li>
                <li>
                  <a href="/public/index.php/ko"><img class="icoNiveau2" src="/assets/img/Stop.png" alt="Ping Ko" title="Affichage les Ko"></a> : Ko
                </li>
              </ul>
            </li>
          </ul>         
          
          <!-- Drop down 2 --> 
          <ul class="niveau1 ">
            <li>
              <img class="icoNiveau1" src="/assets/img/folders-searches.png" alt="Sort by " title="Trier par " >
              <ul class="niveau2Dropdown2 DropDownMenu">
                <li>
                  <a href="/public/"><img class="icoNiveau2" src="/assets/img/dedicated-ip.png" alt="sort by ip" title="Trie par IP" ></a> : Ip
                </li>                                 
                <li>
                  <a href="/public/index.php/byDateKo"><img class="icoNiveau2" src="/assets/img/date.png" alt="sort by old date ko" title="Trie par date Ko" ></a> : Date Ko
                </li>                                 
                <li>
                  <a href="/public/index.php/byName"><img class="icoNiveau2" src="/assets/img/juk.png" alt="sort by name" title="Trie par nom" ></a> : Nom
                </li>                                 
                <li>
                  <a href="/public/index.php/byTypeMat"><img class="icoNiveau2" src="/assets/img/Headphones.png" alt="sort by material type" title="Trie par type de matériel" ></a> : Type de matériel
                </li>                                 
                <li>                                 
                  <a href="/public/index.php/lastAdd"><img class="icoNiveau2" src="/assets/img/last_add.png" alt="last add" title="Trie par dernier ajout" style="width:2.5rem"></a> : Derniers ajouts
                </li>                                 
              </ul>
            </li>
          </ul>
            
          <a href="/public/index.php/freeIp"><img class="ico" src="/assets/img/free.png" alt="Free Ip" title="Ip Libre"></a>

          <!-- Space between left icon and dernier ping text -->
            <div class="mdl-layout-spacer"></div>
            <b style="text-align:center"> 
              <?php echo "Dernier Ping effectué le :" . "<br>" . date('d/m/Y', strtotime($IpAddressLastDate)). "<br>" . date('H:i', strtotime($IpAddressLastDate)); ?> 
            </b>
          
          <!-- Space between left icon and right icon-->
            <div class="mdl-layout-spacer"></div>
          
          <!-- Left icon -->
            <!-- <a class="mdl-navigation__link" href="/public/index.php/pingOkDansBDD">Envoyer les ping Ok dans la BDD</a>           -->
          <!-- Delete Toute la BDD -->
            <a  href="/public/index.php/deleteAll##"><img class="ico" src="/../assets/img/Trash.png" alt="Delete la BDD" title="Delete la BDD" ></a>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                        mdl-textfield--floating-label mdl-textfield--align-right">  

              <label class="mdl-button mdl-js-button mdl-button--icon"
                    for="fixed-header-drawer-exp">
                    <img src="/assets/img/Search.png" alt="Sort by " title="Trier par" style="width:2.3rem"  >
                <!-- <i class="material-icons">search</i> -->
              </label>

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